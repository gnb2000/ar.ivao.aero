<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Exam, App\Models\Training, App\Models\TrainingRequested,
    App\Models\AtcPosition, App\Models\StaffMember,
    App\Models\StaffAction, App\Models\User,
    App\Models\TrainingPenalty, App\Models\TrainingPoint;
use Illuminate\Http\Request;

//include($_SERVER['DOCUMENT_ROOT'].'/funciones.php');

class TrainingController extends Controller
{    
    public function list()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $atcs = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.training_date AS training_date, trainings.name AS name, trainings.rating AS rating')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->whereBetween('trainings_requested.state', 6)
                ->where('trainings.type', 'atc')
                ->orderBy('trainings_requested.training_date', 'DESC')
                ->get();


        $pilotos = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.trainer AS trainer, trainings_requested.training_date AS training_date, trainings_requested.comments AS comments')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->where('trainings_requested.state', 6)
                ->where('trainings.type', 'pilot')
                ->orderBy('trainings_requested.training_date', 'DESC')
                ->get();

        return view('intraweb.Training.my.list', compact('user', 'staffMembers', 'isADM', 'atcs', 'pilotos'));
    }

    public function my()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $atcs = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.training_date AS training_date, trainings.name AS name, trainings.rating AS rating')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->whereNotIn('trainings_requested.state', [0, 6, 11, 12])
                ->where('trainings.type', 'atc')
                ->get();

        $pilotos = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.trainer AS trainer, trainings_requested.training_date AS training_date, trainings.name AS name, trainings.rating AS rating')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->whereNotIn('trainings_requested.state', [0, 6, 11, 12])
                ->where('trainings.type', 'pilot')
                ->get();

        return view('intraweb.Training.my.list', compact('user', 'staffMembers', 'isADM', 'atcs', 'pilotos'));
    }

    public function stats()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $atcs = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.trainer AS trainer, trainings_requested.scheduled_date AS scheduled_date, trainings_requested.training_date AS training_date, trainings_requested.state AS state')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->whereNotIn('trainings_requested.state', [0, 11, 12])
                ->where('trainings.type', 'atc')
                ->orderBy('trainings_requested.id', 'DESC')
                ->limit(25)
                ->get();

        $pilotos = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.trainer AS trainer, trainings_requested.scheduled_date AS scheduled_date, trainings_requested.training_date AS training_date, trainings_requested.state AS state')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->whereNotIn('trainings_requested.state', [0, 11, 12])
                ->where('trainings.type', 'pilot')
                ->orderBy('trainings_requested.id', 'DESC')
                ->limit(25)
                ->get();

        return view('intraweb.Training.stats.list', compact('user', 'staffMembers', 'isADM', 'atcs', 'pilotos'));
    }

    public function TrainingsRequestedList()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $atcs = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.trainer AS trainer, trainings_requested.training_date AS training_date, trainings.name AS name, trainings.rating AS rating')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->whereNotIn('trainings_requested.state', [0, 6, 11, 12])
                ->where('trainings.type', 'atc')
                ->get();

        $pilotos = TrainingRequested::selectRaw('trainings_requested.id AS id, trainings_requested.member AS member, trainings_requested.trainer AS trainer, trainings_requested.training_date AS training_date, trainings.name AS name, trainings.rating AS rating')
                ->join('trainings', 'trainings_requested.id_training', '=', 'trainings.id')
                ->whereNotIn('trainings_requested.state', [0, 6, 11, 12])
                ->where('trainings.type', 'pilot')
                ->get();

        return view('intraweb.Training.requested.list', compact('user', 'staffMembers', 'isADM', 'atcs', 'pilotos'));
    }

    public function trainingSchedule(Request $request)
    {
        if(!empty($request->all()))
        {
            $training = TrainingRequested::find($request->id);
            if(is_null($training))
            {
                $training = new TrainingRequested();
                $training->id = $request->id;
                $training->rating = $request->rango;
                $training->member = $request->vid;
                $training->trainer = Auth::user()->vid;
                $training->atc_position = $request->posicion;
                $training->state = 4;
                $training->training_date = $request->fecha;
            }
            else
            {
                $training->rating = $request->rango;
                $training->member = $request->vid;
                $training->trainer = Auth::user()->vid;
                $training->atc_position = $request->posicion;
                $training->state = 4;
                $training->training_date = $request->fecha;
            }


            if($training->save()) flash()->success('Entrenamiento Programado')->important();
            else flash()->error($training->errors()->first())->important();

            $id = $training->id;
            $posicion = $training->atc_position;
            $emailAlumno = $this->obtenerEmailUsuario($training->member);
            $emailStaff = $this->obtenerEmailStaff($training->trainer);
			$emailPR = 'rrpp@ar.ivao.aero';

            $headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
                       "Cc: $emailStaff, $emailPR\r\n".
                       "Content-Type: text/html; charset=utf-8\r\n".
                       "MIME-Version: 1.0\r\n";
            $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Training Programado</h2>Le informamos que el training con ID $id ha sido programado.<br /><br /><br />\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: ".$training->member."</div>\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador</strong>: ".$this->obtenerNombreUsuario($training->trainer)."</div>\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Posici&oacute;n</strong>: $posicion</div>\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Programada</strong>: ".$request->fecha." UTC</div><br /><br /></body></html>";
        
            mail($emailAlumno, 'Entrenamiento Programado', $body, $headers) or die('<p class="alert-danger">Ha habido un error al enviar el email.</p>');

            return redirect()->action('TrainingController@trainingSchedule');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            $users = User::orderBy('vid')->get();
            $positions = AtcPosition::groupBy('fir')->orderBy('fir')->orderBy('PosId')->get();

            return view('intraweb.Training.trainings.schedule', compact('user', 'staffMembers', 'isADM', 'users', 'positions'));
        }
    }

    public function examSchedule(Request $request)
    {
        if(!empty($request->all()))
        {
            $exam = Exam::find($request->id);
            if(is_null($exam))
            {
                $exam = new Exam();
                $exam->id = $request->id;
                $exam->exam = $request->rango;
                $exam->vid = $request->vid;
                $exam->examiner = Auth::user()->vid;
                $exam->position = $request->posicion;
                $exam->date = $request->fecha;
            }
            else
            {
                $exam->exam = $request->rango;
                $exam->vid = $request->vid;
                $exam->examiner = Auth::user()->vid;
                $exam->position = $request->posicion;
                $exam->date = $request->fecha;
            }

            if($exam->save()) flash()->success('Examen Programado')->important();
            else flash()->error($exam->errors()->first())->important();

            $id = $request->id;
            $posicion = $exam->position;
            $emailAlumno = $this->obtenerEmailUsuario($exam->vid);
            $emailStaff = $this->obtenerEmailStaff($exam->examiner);
			$emailPR = 'rrpp@ar.ivao.aero';

            $headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
                       "Cc: $emailStaff,$emailPR\r\n".
                       "Content-Type: text/html; charset=utf-8\r\n".
                       "MIME-Version: 1.0\r\n";
            $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"https://ar.ivao.aero/img/logomail.jpg\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Examen Programado</h2>Le informamos que el examen con ID $id ha sido programado.<br /><br /><br />\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: ".$exam->vid."</div>\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Examinador</strong>: ".$this->obtenerNombreUsuario($exam->examiner)."</div>\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Posici&oacute;n</strong>: $posicion</div>\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Programada</strong>: ".$request->fecha." UTC</div><br /><br /></body></html>";
        
        mail($emailAlumno, 'Examen Programado', $body, $headers) or die('<p class="alert-danger">Ha habido un error al enviar el email.</p>');

            return redirect()->action('TrainingController@trainingSchedule');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            $users = User::orderBy('vid')->get();
            $positions = AtcPosition::groupBy('fir')->orderBy('fir')->orderBy('PosId')->get();

            return view('intraweb.Training.exams.schedule', compact('user', 'staffMembers', 'isADM', 'users', 'positions'));
        }
    }


    public function dateChange($id, Request $request)
    {
        if(!empty($request->all()))
        {
            $training = TrainingRequested::find($id);
            $training->training_date = $request->fecha;

            if($training->save()) flash()->success('Entrenamiento Programado')->important();
            else flash()->error($training->errors()->first())->important();

            $emailAlumno = $this->obtenerEmailUsuario($training->member);
            $emailStaff = $this->obtenerEmailStaff($training->trainer);

            $campo = $training->atc_position != ''
                ? "<div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Posici&oacute;n</strong>: $posicion</div>"
                : '';
            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                       "Cc: $emailStaff\r\n".
                       "Content-Type: text/html; charset=utf-8\r\n".
                       "MIME-Version: 1.0\r\n";
            $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"/img/logo.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Training Programado</h2>Le informamos que el training con ID $id ha sido programado.<br /><br /><br />\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador</strong>: ".$this->obtenerNombreUsuario($training->trainer)."</div>\n
                $campo\n
                <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Programada</strong>: ".$request->fecha." UTC</div><br /><br /></body></html>";
        
        mail($emailAlumno, 'Entrenamiento Programado', $body, $headers) or die('<p class="alert-danger">Ha habido un error al enviar el email.</p>');

            return redirect()->action('TrainingController@my');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.Training.my.schedule', compact('user', 'staffMembers', 'isADM', 'id'));
        }
    }

    public function complete($id, Request $request)
    {
        $training = TrainingRequested::find($id);

        if(!empty($request->all()))
        {
            $training->state = 6;
            $training->comments = $request->comments;

            $extension = $request->file('archivo')->getClientOriginalExtension();
            $request->file->storeAs('Training/CountingSheets/Entrenamientos', "$id.".$extension, 'archivo');
            $training->url = "https://files.ar.ivao.aero/Training/CountingSheets/Entrenamientos/$id.".$extension;

            $sa = new StaffAction();
            $sa->vid = Auth::user()->vid;
            $sa->action = "Se ha completado el entrenamiento $id";
            $sa->ip = $_SERVER['REMOTE_ADDR'];

            $atcs = $request->atcs;
            $pilotos = $request->pilotos;

            /* foreach($atcs as $atc)
            {
                $point = new TrainingPoint();
                $point->id_training = $request->id;
                $point->vid = $atc;
                $point->points = 1;
                $point->type = 'a';
                $point->save();
            }
            foreach($pilotos as $piloto)
            {
                $point = new TrainingPoint();
                $point->id_training = $request->id;
                $point->vid = $piloto;
                $point->points = $request->id > 300000 ? 1 : 2;
                $point->type = 'p';
                $point->save();
            } */

            if($training->save() && $sa->save()) flash()->success('Entrenamiento Completado')->important();
            else flash()->error($training->errors()->first())->important();

            $emailAlumno = $this->obtenerEmailUsuario($training->member);
            $emailStaff = $this->obtenerEmailStaff($training->trainer);


            $cc = $training->id_training < 11 || $training->id_training == 14 ? "Cc: ar-flightops@ivao.aero\r\n" : ''; //Si es un training ATC incluimos a ops de vuelo, para notificarles de que hay una nueva counting sheet.
            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                       $cc.
                       "Content-Type: text/html; charset=utf-8\r\n".
                       "MIME-Version: 1.0\r\n";
            
            $body = "<html><body><center><img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Entrenamiento Completado</h2>Se ha completado un entrenamiento. Para m&aacute;s info, consulte la intraweb. <br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Entrenamiento</strong>: $id</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: ".obtenerNombreUsuario($training->member)."</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador Asignado</strong>: ".obtenerNombreUsuario($training->trainer)."</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Asignada</strong>: ".$training->training_date." UTC</div><br /><br /></body></html>";
            
            mail('ar-wm@ivao.aero', 'Entrenamiento Completado', $body, $headers);

            return redirect()->action('TrainingController@my');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            $fecha = $training->training_date;

            return view('intraweb.Training.my.complete', compact('user', 'staffMembers', 'isADM', 'id', 'fecha'));
        }
    }

    public function assign($id, Request $request)
    {
        if(! empty($request->all()))
        {
            $training = TrainingRequested::find($id);
            $training->trainer = $request->trainer;
            $training->state = 4;

            $train = Training::find($training->id_training);

            $sa = new StaffAction();
            $sa->vid = Auth::user()->vid;
            $sa->action = 'Se ha asignado el entrenador '.$training->trainer.' al training '.$id;
            $sa->ip = $_SERVER['REMOTE_ADDR'];

            $email = $this->obtenerEmailUsuario($training->member);
            $emailStaff = $this->obtenerEmailStaff($training->trainer);
            
            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                       "Reply-To: $email\r\n".
                       "Content-Type: text/html; charset=utf-8\r\n".
                       "MIME-Version: 1.0\r\n";
            $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"/img/logo.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br />
            <h2>Entrenamiento Asignado</h2>Le informamos que su entrenamiento ha sido asignado a un entrenador. <br /><br /><br />
            <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Solicitud</strong>: ".$training->id."</div>
            <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Alumno</strong>:".$this->obtenerNombreUsuario($training->member)."</div>
            <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenador Asignado</strong>: ".$this->obtenerNombreUsuario($training->trainer)."</div>
            <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Entrenamiento</strong>: ".$train->name."</div>
            <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"></div><br /><br /><br /></body></html>";
            
            mail('ar-wm@ivao.aero', 'Entrenamiento Asignado', $body, $headers);

            if($training->save() && $sa->save()) flash()->success('Entrenador Asignado')->important();
            else flash()->error($training->errors()->first())->important();

            return redirect()->action('TrainingController@TrainingsRequestedList');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            $trainers = User::selectRaw('staff_members.vid AS vid, CONCAT(users.name, \' \', users.surname) AS name')
                ->join('staff_members', 'staff_members.vid', '=', 'users.vid')
                ->whereIn('staff_members.department', ['TRAINING', 'HQ'])
                ->orderBy('name')
                ->get();

            return view('intraweb.Training.requested.assign', compact('user', 'staffMembers', 'isADM', 'trainers', 'id'));
        }
    }
    public function delete($id, Request $request)
    {
        if(! empty($request->all()))
        {
            $trainingRequested = TrainingRequested::find($id);
            $trainingRequested->state = $request->state;

            $motivo = 'Desconocido';
            if($trainingRequested->state == 11) $motivo = 'Teor&iacute;a Insuficiente';
            else if($trainingRequested->state == 12) $motivo = 'Falta de respuesta o asistencia';

            $ausencias = TrainingRequested::where('member',  $trainingRequested->member)
                                            ->where('state', 12)
                                            ->get();

            if(($ausencias->count() % 2) != 0 && $trainingRequested->state == 12) 
            {
                $traniningPenalty = new TrainingPenalty();
                $traniningPenalty->vid = $trainingRequested->member;
                $traniningPenalty->save();
            }

            $sa = new StaffAction();
            $sa->vid = Auth::user()->vid;
            $sa->action = 'Se ha cancelado el entrenamiento '.$trainingRequested->id;
            $sa->ip = $_SERVER['REMOTE_ADDR'];

            $email = $this->obtenerEmailUsuario($trainingRequested->member);
            $emailStaff = $this->obtenerEmailStaff($trainingRequested->trainer);
			
            
            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                       "Cc: $emailStaff\r\n".
                       "Content-Type: text/html; charset=utf-8\r\n".
                       "MIME-Version: 1.0\r\n";
            
            $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"/img/logo.png\" alt=\"IVAO Argentina\" /></center><br />
                    <div style=\"border-bottom: 2px solid #a0a0a0;\"></div>
                    <br /><h2>Entrenamiento Cancelado</h2>Lamentamos comunicarle que el departamento ha cancelado su entrenamiento. <br /><br /><br />
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Motivo</strong>: ".$motivo."</div>
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>ID Solicitud</strong>: ".$trainingRequested->id."</div>
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha Asignada</strong>: ".$trainingRequested->training_date." UTC</div>
                    <br /><br /><br /></body></html>";
            
            mail($email, 'Entrenamiento Cancelado', $body, $headers);

            if($trainingRequested->save() && $sa->save()) flash()->success('Entrenamiento Cancelado')->important();
            else flash()->error($training->errors()->first())->important();

            return redirect()->action('TrainingController@TrainingsRequestedList');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.Training.requested.delete', compact('user', 'staffMembers', 'isADM', 'id'));
        }
    }

    private function obtenerEmailUsuario($vid)
    {
        return User::find($vid)->email;
    }

    private function obtenerEmailStaff($vid)
    {
        return StaffMember::where('vid', $vid)->first()->email;
    }

    private function obtenerNombreUsuario($vid)
    {   
        if(! isset($vid)) return '-';
        
        $user = User::find($vid);

        return $user == NULL ? $vid : $user->name.' '.$user->surname;
    }
}