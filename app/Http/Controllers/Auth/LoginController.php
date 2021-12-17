<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;

use App\Models\User, App\Models\Gca, App\Models\StaffMember;
use Carbon\Carbon;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    private $cookie_name;
    private $login_url;
    private $api_url;
    private $vid;

    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);

        $this->cookie_name = env('IVAO_TOKEN_COOKIE_NAME', 'ivao_token');
        $this->login_url = env('IVAO_LOGIN_URL', 'http://login.ivao.aero');
        $this->api_url = env('IVAO_LOGIN_API_URL', 'http://login.ivao.aero/api.php');
    }

    public function index(Request $request)
    {
        $token = $request->input('IVAOTOKEN');

        //if the token is set in the link
        if ($token && $token != 'error')
        {
            $cookie = Cookie::forever($this->cookie_name, $token);

            return redirect()->action('Auth\LoginController@index')->withCookie($cookie);
        }
        elseif ($token == 'error') die('Domain not allowed for IVAO login');
        

        //check if the cookie is set and/or is correct
        if ($request->cookie('ivao_token'))
        {
            $user_array = json_decode(file_get_contents($this->api_url . '?type=json&token=' . $request->cookie($this->cookie_name)));

            if ($user_array->result)
            {
                $u = NULL;

                if ($user = User::find($user_array->vid)) $u = $user;
                else if($user_array->division == 'AR' || !is_null(Gca::find($user_array->vid)))
                {
                    $u = new User();

                    if(! is_null(Gca::find($user_array->vid))) $u->gca = 1;
                    $u->name = $user_array->firstname;
                    $u->vid = $user_array->vid;
                    $vid = $u->vid;

                    $u->save();

                    return view('registro', compact('vid'));
                }
                else if ($user_array->division != 'AR'){
                    return redirect('/error/A04');
                }

                $u->name = $user_array->firstname;
                $u->surname = $user_array->lastname;
                $u->ivao_rating = $user_array->rating;
                $u->atc_rating = $user_array->ratingatc;
                $u->pilot_rating = $user_array->ratingpilot;
                $u->division = $user_array->division;
                $u->country = $user_array->country;
                $u->HrControl = $user_array->hours_atc;
                $u->HrPilot = $user_array->hours_pilot;
                $u->va_member_ids = $user_array->va_member_ids;
                //$u->staff = $user_array->staff;
                $u->login_last = Carbon::now();
                $u->ip_last = request()->ip();
                $u->ip_reg = $_SERVER['REMOTE_ADDR'];
                $u->save();

                $isStaff = StaffMember::where('vid', $u->vid)->count() > 0;
                
                if($u->active == 1) Auth::loginUsingId($user_array->vid);
                else return redirect('/error/A03');

                if(!isset($cookie))
                {
                    Cookie::queue(Cookie::forever($this->cookie_name, $_COOKIE['ivao_token']));
                    Cookie::queue(Cookie::forever('vid', $u->vid));
                    Cookie::queue(Cookie::forever('name', $u->name));
                    Cookie::queue(Cookie::forever('surname', $u->surname));
                    if($isStaff) Cookie::queue(Cookie::forever('isStaff', $u->$isStaff));
                }

                return redirect('/');
            }
            else return $this->redirectToIvaoLogin();
        }
        else return $this->redirectToIvaoLogin();
    }

    public function logout()
    {
        if(Auth::check()) Auth::logout();
        else if(Auth::guard('ivao')->check()) Auth::guard('ivao')->logout();

        Cookie::queue(Cookie::forget('vid'));
        Cookie::queue(Cookie::forget('name'));
        Cookie::queue(Cookie::forget('surname'));
        Cookie::queue(Cookie::forget('isStaff'));
        Cookie::queue(Cookie::forget('rememberToken'));
        Cookie::queue(Cookie::forget($this->cookie_name));

        return redirect('/');
    }

    public function confirmarEmail($vid)
    {
        $hash = $_GET['hash'];
        $this->vid = $vid;

        $user = User::find($vid);
        if($hash = $user->hash) $user->active = 1;

        if($user->save()) flash()->success('Email confirmado.');
        
        return redirect('/login');
    }


    public function register(Request $request)
    {
        if(!empty($request->all()))
        {
            $vid = $request->vid;

            if($request->email != $request->email2)
            {
                flash()->error('El email no coincide.')->important();

                return view('registro', compact('vid'));
            }

            $email = $request->email;
            $emailmd5 = md5($email);


            $user = User::find($vid);
            $user->birthday = $request->birthday;
            $user->email = $request->email;
            $user->hash = $emailmd5;

            $headers = "From: IVAO Argentina<no-reply@ar.ivao.aero>\r\n"; 
            $headers .= "Content-Type: text/html; charset=utf-8\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Return-Path: postmaster@ar.ivao.aero";
            $headers .= "List-Unsubscribe-Post: List-Unsubscribe=One-Click";
            $headers .= "List-Unsubscribe: <https://ar.ivao.aero/login/unsuscribe.php>";
            $headers .= "Message-Id: <".$emailmd5."@ar.ivao.aero>";

            $nombre = $user->name;
            $fecha = gmdate('d-m-Y H:i');
            $asunto = "Bienvenido a IVAO Argentina $nombre";

            $body = "<html>
            <body>
            <center>
            <img src=\"https://ar.ivao.aero/images/logomail.png\" alt=\"IVAO Argentina\" />
            </center><br /><br />
            <div style=\"border-bottom: 2px solid #a0a0a0;\"></div>
            <br />
            <h2>Bienvenido a IVAO Argentina $nombre!</h2>
            <p>Desde IVAO Argentina queremos darte la bienvenida a la comunidad. Dentro de la división encontraras todo el material necesario para comenzar tu formación com piloto y/o controlador virtual. Asi mismo contaras con el apoyo de personal especializado que podra ayudarte con todas tu dudas y prepararte para seguir esta carrera.</p>
            
            <p>En los siguientes enlaces podras encontrar guias para iniciantes de <a href=\"http://files.ar.ivao.aero/Training/Manuales/Start_Pilotos.pdf\">pilotos</a> y <a href=\"http://files.ar.ivao.aero/Training/Manuales/Start_ATC.pdf\">controladores</a>.<br />
            Si necesitas ayuda en tus primeras conexiones no olvides de contactar al departamento de miembros (miembros@ivao.com.ar) o si no sabes donde encaminar tu duda envia un email a hola@ivao.com.ar o utiliza este <a href=\"https://ar.ivao.aero/comunidad/contacto\">formulario de contacto</a>. Para dudas recuerda consultar la pagina de <a href=\"https://ar.ivao.aero//comunidad/faq\">Preguntas Frecuentes</a>.<br />
            IVAO Argentina cuenta con un servidor de Discord exclusivo para el uso de sus miembros, si deseas conectarte usa la informacioón de conexión que se encuentra <a href=\"https://ar.ivao.aero/recursos/discord\">aquí</a> (no olvides de leer la normativa).</p>
            
            <p>Antes que nada para empezar a usar su cuenta en la página de la división y acceder a todos los recursos excluivos para los miembros, deber&aacute; ingresar al siguiente enlace para validar su cuenta:<br />
            <a href=\"https://ar.ivao.aero/email/$vid/confirm?hash=$emailmd5\">https://ar.ivao.aero/email/$vid/confirm?hash=$emailmd5</a>
            </p>
            <p>
            Código de Verificación: $emailmd5
            </p><br />
            
            Bienvenido nuevamente,<br />
            Saludos,<br />
            El Staff<br /><br />
            
            Si has recibido este email por equivocación o no deseas completar tu registro ingresa <a href=\"https://ar.ivao.aero/email/$vid/confirm?hash=$emailmd5&del=1\">aquí</a>.<br />       
            <div style=\"border-bottom: 1px dotted #0F0F0F;padding: 10px 0px 0px;\">Fecha de Envío: $fecha UTC</div><br />
            </body>
            </html>";

            mail($email, $asunto, $body, $headers);

            if($user->save()) flash()->success('<div class="alert alert-sucess alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <strong>Bienvenido!</strong> Se ha registrado correctamente. Por favor compruebe su cuenta de email para confirmar el registro antes de iniciar sesión.<br><br>Si no ha recibido el email de confirmación no olvide mirar la carpeta de Spam o Correo no deseado.
                        </div>')->important();
            else flash()->error($user->errors()->first())->important();

            return redirect('/login');
        }
    }

    private function redirectToIvaoLogin()
    {
        $cookie = Cookie::make($this->cookie_name, '', -3600);
        return redirect($this->login_url . '?url=' . action('Auth\LoginController@index'))
            ->withCookie($cookie);
    }
}