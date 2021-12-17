<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\StaffMember, App\Models\StaffPosition, App\Models\StaffAction, App\Models\User, App\Models\Event, App\Models\EventEn, App\Models\EventBanner;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $events = Event::join('event_banners', 'event_banners.id','=','events.banner_id')
					->orderBy('start_date', 'DESC')
					->get();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        return view('intraweb.Eventos.eventos.list', compact('user', 'staffMembers', 'events', 'isADM'));
    }

    public function listEN()
    {
        $user = Auth::user();
        $events = EventEn::orderBy('start_date', 'DESC')->get();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        return view('intraweb.Eventos.eventos.list', compact('user', 'staffMembers', 'events', 'isADM'));
    }

    public function add(Request $request)
    {
        if(! empty($request->all()))
        {
            $ip = $_SERVER['REMOTE_ADDR'];
            $user = Auth::user();

            $event = $request->idioma == 'es' ? new Event() : new EventEn();
            $event->type = $request->tipo;
            $event->name = $request->nombre;
            $event->start_date = $request->fechainicio;
            $event->end_date = $request->fechafin;
            $event->description = $request->descripcion;
            $event->details = $request->detalles;
            $event->image = $request->banner;

            $sa = new StaffAction();
            $sa->vid = $user->vid;
            $sa->action = 'Se ha agregado el evento '.$request->nombre;
            $sa->ip = $ip;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://ar.ivao.aero/cron/BannerUsado.php");
            curl_setopt($ch, CURLOPT_HEADER, 0);
            curl_exec($ch);
            curl_close($ch);

            if($event->save() && $sa->save()) flash()->success('Evento Agregado')->important();
            else flash()->error($event->errors()->first())->important();

            return redirect()->action('EventController@list');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            $banners = EventBanner::where('Used', 0)->orderBy('id', 'DESC')->get();

            return view('intraweb.Eventos.eventos.add', compact('user', 'banners', 'staffMembers', 'isADM'));
        }
    }

    public function delete($idioma, $id)
    {
        if(! Auth::check()) return redirect('/error/401');

        $event = $idioma == 'es' ? Event::find($id) : EventEn::find($id);
        $banner = EventBanner::where('Code', $tour->code)->first();
        $banner->used = 0;

        if($event->delete() && $banner->save()) flash()->success('Evento eliminado')->important();
        else flash()->error($position->errors()->first())->important();

        return $idioma == 'es' ? redirect()->action('EventController@list')
                               : redirect()->action('EventController@listEN');
    }
}