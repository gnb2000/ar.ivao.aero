<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\DB;
use App\Models\TrainingPoint, App\Models\TrainingRequested, App\Models\Exam;
use App\Models\StaffAction, App\Models\StaffMember, App\Models\User;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    public function add(Request $request)
    {
        $user = Auth::user();
        
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid)
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(! empty($request->all()))
        {
            $id = $request->id;
            $url = '-';

            if($request->hasFile('archivo'))
            {
                $carpeta = $request->id > 300000 ? 'Examenes' : 'Entrenamientos';
                $extension = $request->file('archivo')->getClientOriginalExtension();
                $request->archivo->storeAs("Training/CountingSheets/$carpeta/", "$id.$extension", 'files') or flash()->error('Ha habido un error al enviar el archivo.')->important();

                $url = "https://files.ar.ivao.aero/Training/CountingSheets/$carpeta/$id.$extension";
            }

            $atcs = $request->atcs;
            $pilotos = $request->pilotos;

            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                       "Content-Type: text/html; charset=utf-8\r\n".
                       "MIME-Version: 1.0\r\n";

            if($atcs != NULL)
            foreach($atcs as $atc)
            {
                $point = new TrainingPoint();
                $point->id_training = $id;
                $point->vid = $atc;
                $point->points = 1;
                $point->type = 'a';
                $point->save();

                $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Puntos Agregados</h2>Le informamos que el departamento de entrenamiento ha agregado el punto correspondiente a su participaci&oacute;n.<br /><br /><br />\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Training/Examen</strong>: $id</div>\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Medalla</strong>: ATC Support</div>\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: ".$request->fecha." UTC</div><br /><br /></body></html>";

                mail($this->obtenerEmailUsuario($atc), "Punto Agregado", $body, $headers);
            }

            if($pilotos != NULL)
            foreach($pilotos as $piloto)
            {
                $point = new TrainingPoint();
                $point->id_training = $id;
                $point->vid = $piloto;
                $point->points = 1;
                $point->type = 'p';
                $point->save();

                $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Puntos Agregados</h2>Le informamos que el departamento de entrenamiento ha agregado el punto correspondiente a su participaci&oacute;n.<br /><br /><br />\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Training</strong>: $id</div>\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Medalla</strong>: Pilot Support</div>\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: ".$request->fecha." UTC</div><br /><br /></body></html>";

                mail($this->obtenerEmailUsuario($piloto), "Punto Agregado", $body, $headers);
            }

            $sa = new StaffAction();
            $sa->vid = $user->vid;
            $sa->action = 'Se ha agregado asistencia para la fecha '.$request->fecha;
            $sa->ip = $_SERVER['REMOTE_ADDR'];

            if($sa->save()) flash()->success('Asistencia Agregada.<br>URL: '.$url)->important();
            else flash()->error($sa->errors()->first())->important();

            return redirect()->action('PointsController@add');
        }
        else
        {
            $trainings = TrainingRequested::where('training_date', '<', DB::raw('NOW()'))
                                            ->whereRaw("TIMESTAMPDIFF(DAY, training_date, NOW()) < 31")
                                            ->whereRaw("NOT EXISTS(SELECT * FROM training_points WHERE id_training = trainings_requested.id)")
                                            ->orderBy('id')
                                            ->get();

            $exams = Exam::where('date', '<', DB::raw('NOW()'))
                        ->whereRaw("TIMESTAMPDIFF(DAY, date, NOW()) < 31")
                        ->whereRaw("NOT EXISTS(SELECT * FROM training_points WHERE id_training = exams.id)")
                        ->orderBy('id')
                        ->get();

            return view('intraweb.Training.points.add', compact('user', 'staffMembers', 'isADM', 'trainings', 'exams'));
        }
    }

    public function search(Request $request)
    {
        $user = Auth::user();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();

        $staffMembersADM = StaffMember::where('vid', $user->vid)
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if (!empty($request->all()))
        {
            $points = TrainingPoint::select(DB::raw('SUM(points) as points, type'))
                                ->where('vid', $request->input('search'))
                                ->groupBy('type')
                                ->get();
            
            $userName = User::find($request->input('search'));

            return view('intraweb.Training.points.showPoints', compact('user', 'points', 'staffMembers', 'userName', 'isADM'));

        }
        else return view('intraweb.Training.points.search', compact('user', 'staffMembers', 'isADM'));
    }

    private function obtenerEmailUsuario($vid)
    {
        $user = User::find($vid);
        return !is_null($user) ? $user->email : '';
    }
}
