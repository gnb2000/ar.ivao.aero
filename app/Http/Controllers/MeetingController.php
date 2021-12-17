<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Meeting, App\Models\StaffMember;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function add(Request $request)
    {
        if(!empty($request->all()))
        {
            $meeting = new Meeting();
            $meeting->date = $request->f1;
            $meeting->text = $request->texto;

            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n".
                        "Content-Type: text/html; charset=utf-8\r\n".
                        "MIME-Version: 1.0\r\n";    
            $body = '<html><body><center><img src="https://ar.ivao.aero/img/logomail.png" alt="IVAO Argentina" /></center><br /><br /><div style="border-bottom: 2px solid #a0a0a0;"></div><br /><h2>Nueva Reuni&oacute;n Programada</h2>Le informamos que una nueva reuni&oacute;n ha sido programada. Por favor, confirme asistencia a Direcci&oacute;n por el medio de comunicaci&oacute;n deseado.<br /><br /><br /><div style="border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;"><strong>Fecha</strong>: '.$request->f1.' UTC</div> <div style="border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;"><strong>Puntos del d&iacute;a</strong>: '.$request->texto.'</div><br /></body></html>';
        
            mail('ar-staff@ivao.aero', 'Reunion Staff', $body, $headers);


            if($meeting->save()) flash()->success('Reuni&oacute;n programada')->important();
            else flash()->error($staffMember->errors()->first())->important();

            return redirect()->action('MeetingController@add');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.HQ.reuniones.add', compact('user', 'staffMembers', 'isADM'));
        }
    }
}
