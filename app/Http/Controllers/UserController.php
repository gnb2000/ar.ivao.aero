<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User, App\Models\StaffAction, App\Models\StaffMember, App\Models\AwardToUser, App\Models\TrainingPoint;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function search(Request $request)
    {        
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(!empty($request->all()))
        {
            $miembros = NULL;
            switch($request->campo)
            {
                case('vid'):
                {
                    $miembros = User::where('vid', $request->search)->get(); 
                    break;
                }
                case('nombre'):
                {
                    $miembros = User::where('name', 'like', '%'.$request->search.'%')->get(); 
                    break;
                }
                case('apellido'):
                {
                    $miembros = User::where('surname', 'like', '%'.$request->search.'%')->get(); 
                    break;
                }
                case('email'):
                {
                    $miembros = User::where('email', 'like', '%'.$request->search.'%')->get();
                    break;
                }
                case('ip'):
                {
                    $miembros = User::where('ip_reg', $request->search)->get();
                    break;
                }
            }

            $enviar = 1;
            return view('intraweb.Miembros.miembros.search', compact('user', 'staffMembers', 'isADM', 'miembros', 'enviar'));
        }
        else
        {        
            return view('intraweb.Miembros.miembros.search', compact('user', 'staffMembers', 'isADM'));
        }    
    }

    public function edit($vid, Request $request)
    {
        if(!empty($request->all()))
        {
            $usuario = User::find($vid);
            $usuario->name = $request->nombre;
            $usuario->surname = $request->apellido;
            $usuario->email = $request->email;
            $bArray = explode('-', str_replace('/', '-', $request->cumple));
            $usuario->birthday = $bArray[2].'-'.$bArray[1].'-'.$bArray[0];

            $staff = Auth::user();
            $sa = new StaffAction();
            $sa->vid = $staff->vid;
            $sa->action = "Se ha modificado el miembro $vid";
            $sa->ip = $_SERVER['REMOTE_ADDR'];

            if($usuario->save() && $sa->save()) flash()->success('Usuario Modificado')->important();
            else flash()->error($usuario->errors()->first())->important();

            return redirect()->action('UserController@search');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            $miembro = User::find($vid);

            return view('intraweb.Miembros.miembros.edit', compact('user', 'staffMembers', 'isADM', 'miembro'));
        }
    }

    public function validar()
    {
        $user = Auth::user();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid)
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $users = User::where('active', 0)->orderBy('regTime', 'DESC')->get();

        return view('intraweb.Miembros.miembros.validate', compact('user', 'staffMembers', 'isADM', 'users'));
    }

    public function activate($vid)
    {
        if(! Auth::check()) return redirect('/error/401');

        $user = User::find($vid);
        $user->active = 1;

        $staff = Auth::user();
        $hoy = date('Y-m-d H:i');
        $headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
               "Content-Type: text/html; charset=utf-8\r\n".
               "MIME-Version: 1.0\r\n";
        $body = "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"/img/logo.png\" alt=\"IVAO Argentina\" /></center><br /><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br /><h2>Cuenta Validada</h2>Le informamos que nuestro staff ha validado su cuenta. Puede hacer login accediendo a https://ar.ivao.aero. Bienvenido a IVAO Argentina.<br /><br /><br /><div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Staff</strong>: ".$staff->name.' '.$staff->surname."</div> <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $hoy UTC</div><br /><br /></body></html>";

        mail($user->email, 'Cuenta Validada', $body, $headers);

        if($user->save()) flash()->success('Miembro validado')->important();
        else flash()->error($user->errors()->first())->important();

        return redirect()->action('UserController@search');
    }

    public function deleteSearch($vid)
    {
        if(! Auth::check()) return redirect('/error/401');

        $user = User::find($vid);

        if($user->delete()) flash()->success('Miembro eliminado')->important();
        else flash()->error($user->errors()->first())->important();

        return redirect()->action('UserController@search');
    }

    public function deleteValidate($vid)
    {
        if(! Auth::check()) return redirect('/error/401');

        $user = User::find($vid);

        if($user->delete()) flash()->success('Miembro eliminado')->important();
        else flash()->error($user->errors()->first())->important();

        return redirect()->action('UserController@validar');
    }

    public function perfil()
    {
        if(! Auth::check()) return redirect('/error/401');

        $authUser = Auth::user();
        $user = isset($_GET['vid']) ? User::find($_GET['vid']) : $authUser;
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;
        $meritos = AwardToUser::where('vid', Auth::user()->vid)->get();
        $points = TrainingPoint::select(DB::raw('SUM(points) as points, type'))
                                ->where('vid', $user->vid)
                                ->groupBy('type')
                                ->get();

        return view('perfil', compact('user', 'authUser', 'staffMembers', 'isADM', 'meritos', 'points'));
    }

    public function editarPerfil(Request $request, $vid = 0)
    {
        if(! Auth::check()) return redirect('/error/401');

        if(! empty($request->all()))
        {
            $ahora = date('d-m-Y H:i');
            $member = $this->obtenerNombreUsuario($vid);
            $discord = $request->discord;

            $user = User::find($vid);
            $user->discord = $discord;
            $user->obs_user = $request->obs_user;
            $modificado = $user->consent != $request->consent;
            $user->consent = $request->consent;
            $user->directory = $request->direc;

            if($modificado && $discord != '')
            {
                $html = $user->consent ? '<h2>Consentimiento Aceptado</h2>El miembro ha aceptado el consentimiento Discord.' : '<h2>Consentimiento Denegado</h2>El miembro ha denegado el consentimiento Discord.';

                $status = $user->consent ? 'Consentimiento Aceptado' : 'Consentimiento Denegado';

                $headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
                           "Cc: ar-wm@ivao.aero\r\n".
                           "Content-Type: text/html; charset=utf-8\r\n".
                           "MIME-Version: 1.0\r\n";
                $body = 
                    "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"https://ar.ivao.aero/img/logo.png\" alt=\"IVAO Argentina\" /></center><br /><div style=\"border-bottom: 2px solid #a0a0a0;\"></div><br />$html<br /><br /><br />\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Miembro</strong>: $vid $member</div>\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Discord</strong>: $discord</div>\n
                    <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $ahora</div><br /><br /></body></html>";
               
                mail('miembros@ar.ivao.aero', $status, $body, $headers);
            }

            if($user->save()) flash()->success('Datos actualizados')->important();
            else flash()->error($user->errors()->first())->important();
                
            if($user->discord != '' && !$user->consent) flash()->error('No diste el consentimiento para utilizar tus datos en Discord.')->important();
            else if($user->discord == '' && $user->consent) flash()->error('No has introducido tu usuario Discord.')->important();

            return redirect()->action('UserController@perfil');
        }
        else
        {
            $user = Auth::user();

            return view('editarperfil', compact('user'));
        }
    }

    public function sendSurvey()
    {
        if( !Auth::check() ) return redirect('/error/401');

        $authUser = Auth::user();
        $user = $authUser;
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();

        $isADM = count($staffMembersADM) > 0;

        $ahora = date('d-m-Y H:i');
        /* SELECT DISTINCT users.vid AS vid, users.email AS email, online_atcs.callsign FROM `users` 
            LEFT JOIN online_atcs ON users.vid = online_atcs.vid
            AND dt >= DATE_SUB(NOW(), INTERVAL 1 MONTH)
            WHERE callsign IS NULL
            ORDER BY users.vid; */
        $lista = 'emiliocr90@gmail.com, emilio.cloquell@ivao.aero';
        $headers = "From: IVAO Argentina <no-reply@ar.ivao.aero>\r\n".
                   "Cc: ar-wm@ivao.aero\r\n".
                   "Bcc: $lista\r\n".
                   "Content-Type: text/html; charset=utf-8\r\n".
                   "MIME-Version: 1.0\r\n";
        $body = 
            "<html><body><center><img style=\"width: 80%; height: auto;\" src=\"https://ar.ivao.aero/img/logo.png\" alt=\"IVAO Argentina\" /></center><br />\n
            <div style=\"border-top: 1px dotted #0F0F0F;padding: 10px 0px 10px;\"><strong>Fecha</strong>: $ahora</div><br /><br /></body></html>";
       
        mail('ar-hq@ivao.aero', 'Encuesta IVAO AR', $body, $headers);

        echo 'Enviado.';
    }

    private function obtenerNombreUsuario($vid)
    {
        $user = User::find($vid);

        return $user->name.' '.$user->surname;
    }
}