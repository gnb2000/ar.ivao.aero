<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\DB;
use App\Models\OnlineATC, App\Models\StaffMember, App\Models\User, App\Models\Gca;
use Illuminate\Http\Request, Illuminate\Support\Collection;

class GcaController extends Controller
{
    public function ATClist()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        
        $gcas = Gca::get();

        $tresMeses = Gca::selectRaw("SUM(online) AS suma, CONCAT(YEAR(dt), '-', MONTH(dt)) AS fecha, gca.vid AS vid, name")
                    ->join('online_atcs', 'gca.vid', '=', 'online_atcs.vid')
                    ->whereRaw('dt > DATE_SUB(NOW(), INTERVAL 4 MONTH)')
                    ->whereRaw('MONTH(dt) <> MONTH(NOW())')
                    ->groupBy(DB::raw('YEAR(dt), MONTH(dt)'))
                    ->groupBy('gca.vid')
                    ->groupBy('name')
                    ->orderByRaw('YEAR(dt) DESC')->orderByRaw('MONTH(dt) DESC')
                    ->get();

        $seisMeses = array();
        foreach($gcas as $gca)
        {
            $vid = $gca->vid;
            $nombre =$gca->name;
            $rango = $gca->rating;
            
            $restricciones = $gca->comments != '' ? explode('|', $gca->comments) : '';
            
            $restriccionesSQL = '';
            if($restricciones != '')
                foreach($restricciones as $rest) $restriccionesSQL .= "AND callsign NOT LIKE '$rest%' ";
            
            if($rango == 'ADC') $sqlPos = "'DEL', 'GND', 'TWR', 'APP'";
            else if($rango == 'APC') $sqlPos = "'DEL', 'GND', 'TWR', 'APP'";
            else if($rango == 'ACC') $sqlPos = "'DEL', 'GND', 'TWR', 'APP', 'CTR'";

            $elementos = OnlineATC::where('vid', $vid)
                    ->where('online', '>', 300)
                    ->whereRaw("SUBSTRING(callsign, -3) NOT IN ($sqlPos) $restriccionesSQL")
                    ->whereRaw('dt > DATE_SUB(NOW(), INTERVAL 6 MONTH)')
                    ->orderBy('dt', 'DESC')
                    ->get();

            foreach($elementos as $elemento)
            {
                $seisMeses[] = ['vid' => $vid, 'name' => $nombre, 'callsign' => $elemento->callsign, 'online' => $elemento->online, 'dt' => $elemento->dt];
            }
        }

        return view('intraweb.ATC.gca.list', compact('user', 'staffMembers', 'isADM', 'gcas', 'tresMeses', 'seisMeses'));
    }

    public function TrainingList()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        
        $gcas = Gca::get();

        $tresMeses = Gca::selectRaw("SUM(online) AS suma, CONCAT(YEAR(dt), '-', MONTH(dt)) AS fecha, gca.vid AS vid, name")
                    ->join('online_atcs', 'gca.vid', '=', 'online_atcs.vid')
                    ->whereRaw('dt > DATE_SUB(NOW(), INTERVAL 4 MONTH)')
                    ->whereRaw('MONTH(dt) <> MONTH(NOW())')
                    ->groupBy(DB::raw('YEAR(dt), MONTH(dt)'))
                    ->groupBy('gca.vid')
                    ->groupBy('name')
                    ->orderByRaw('YEAR(dt) DESC')->orderByRaw('MONTH(dt) DESC')
                    ->get();


        $seisMeses = array();
        foreach($gcas as $gca)
        {
            $vid = $gca->vid;
            $nombre =$gca->name;
            $rango = $gca->rating;
            
            $restricciones = $gca->comments != '' ? explode('|', $gca->comments) : '';
            
            $restriccionesSQL = '';
            if($restricciones != '')
                foreach($restricciones as $rest) $restriccionesSQL .= "AND callsign NOT LIKE '$rest%' ";
            
            if($rango == 'ACC') $sqlPos = "'DEL', 'GND', 'TWR', 'APP', 'CTR'";
            else $sqlPos = "'DEL', 'GND', 'TWR', 'APP'";

            $elementos = OnlineATC::where('vid', $vid)
                    ->where('online', '>', 300)
                    ->whereRaw("SUBSTRING(callsign, -3) NOT IN ($sqlPos) $restriccionesSQL")
                    ->whereRaw('dt > DATE_SUB(NOW(), INTERVAL 6 MONTH)')
                    ->orderBy('dt', 'DESC')
                    ->get();

            foreach($elementos as $elemento)
            {
                $seisMeses[] = ['vid' => $vid, 'name' => $nombre, 'callsign' => $elemento->callsign, 'online' => $elemento->online, 'dt' => $elemento->dt];
            }
        }

        return view('intraweb.Training.gca.list', compact('user', 'staffMembers', 'isADM', 'gcas', 'tresMeses', 'seisMeses'));
    }

    public function add(Request $request)
    {
        if(!empty($request->all()))
        {
            $gca = new Gca();
            $gca->vid = $request->vid;
            $gca->name = $request->nombre;
            $gca->rating = $request->rango;
            $gca->comments = $request->restricciones;
            $gca->accept_date = $request->fecha;

            if($gca->save()) flash()->success('GCA agregado')->important();
            else flash()->error($gca->errors()->first())->important();

            return redirect()->action('GcaController@TrainingList');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.Training.gca.add', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function delete($vid)
    {
        if(! Auth::check()) return redirect('/error/401');

        $gca = Gca::find($vid);

        if($gca->delete()) flash()->success('GCA eliminado')->important();
        else flash()->error($gca->errors()->first())->important();

        return redirect()->action('GcaController@TrainingList');
    }
}
