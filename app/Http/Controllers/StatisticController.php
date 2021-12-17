<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Statistic, App\Models\StaffAction, App\Models\StaffMember;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $estadisticas = Statistic::orderBy('id')->get();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        return view('intraweb.Miembros.estadisticas.list', compact('user', 'staffMembers', 'isADM', 'estadisticas'));
    }

    public function add(Request $request)
    {
        if(!empty($request->all()))
        {
            $today = date('Y-m-d');
            $extension = $request->file('file')->getClientOriginalExtension();

            $ultima = Statistic::orderBy('id', 'DESC')->first();
            $TimeWeek = $request->TotalTime - $ultima->TotalTime;
            $lastID = $ultima->id;

            $user = Auth::user();
            $sa = new StaffAction();
            $sa->vid = $user->vid;
            $sa->action = 'Se ha subido una nueva estad&iacute;stica';
            $sa->ip = $_SERVER['REMOTE_ADDR'];

            $stat = new Statistic();
            $stat->Date = $today;
            $stat->TotalMembers = $request->TotalMembers;
            $stat->ActiveMembers = $request->ActiveMembers;
            $stat->TotalTime = $request->TotalTime;
            $stat->TimeWeek = $TimeWeek;
            $stat->RegWeek = $request->RegWeek;

            $request->file->storeAs('Miembros/Estadisticas', ($lastID + 1).'.'.$extension, 'files');

            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                        "Content-Type: text/html; charset=utf-8\r\n".
                        "MIME-Version: 1.0\r\n";    
            $body = '<html><body><center><img src="https://ar.ivao.aero/img/logo.png" alt="IVAO Argentina" /></center><br /><br /><div style="border-bottom: 2px solid #a0a0a0;"></div><br /><h2>Nueva Estad&iacute;stica Cargada</h2>Le informamos que '.$user->name.' ha cargado una nueva estad&iacute;stica. Para m&aacute;s info, acceda a la intraweb.<br /><br /><br /><div style="border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;"><strong>Fecha</strong>: '.date('d-m-Y').'</div><br /></body></html>';
    
            mail('ar-hq@ivao.aero', 'Nueva Estadistica', $body, $headers);


            if($stat->save() && $sa->save()) flash()->success('Estad&iacute;stica Agregada')->important();
            else flash()->error($staffMember->errors()->first())->important();

            return redirect()->action('StatisticController@add');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.Miembros.estadisticas.add', compact('user', 'staffMembers', 'isADM'));
        }
    }
}
