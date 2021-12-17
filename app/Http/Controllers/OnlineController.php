<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth, Illuminate\Support\Facades\DB;
use App\Models\OnlineATC, App\Models\OnlineFlight, App\Models\CountFlight,  App\Models\StaffMember, App\Models\AtcPosition;
use Illuminate\Http\Request;

class OnlineController extends Controller
{
    public function ATCstats(Request $request)
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(! empty($request->all()))
        {
            $positions = AtcPosition::all();

            $firHours = OnlineATC::selectRaw('atc_positions.fir AS fir, SUM(online_atcs.online) AS suma')
            ->join('atc_positions', 'online_atcs.callsign', '=', 'atc_positions.posid')
            ->whereBetween('online_atcs.dt', [$request->f1, $request->f2])
            ->groupBy('fir')
            ->orderBy('suma', 'DESC')
            ->get();

            $posHours = OnlineATC::selectRaw('callsign, SUM(online) AS suma, fir')
            ->join('atc_positions', 'online_atcs.callsign', '=', 'atc_positions.posid')
            ->whereBetween('dt', [$request->f1, $request->f2])
            ->groupBy('callsign')
            ->orderBy('suma', 'DESC')
            ->limit(5)
            ->get();

            $userHours = OnlineATC::selectRaw('vid, SUM(online) AS suma')
            ->whereBetween('dt', [$request->f1, $request->f2])
            ->groupBy('vid')
            ->orderBy('suma', 'DESC')
            ->limit(5)
            ->get();


            return view('intraweb.ATC.stats.list', compact('user', 'staffMembers', 'isADM', 'positions', 'firHours', 'posHours', 'userHours'));
        }
        else
        {
            return view('intraweb.ATC.stats.formStats', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function FlightStats(Request $request)
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(! empty($request->all()))
        {
            $vuelosNacionales = OnlineFlight::selectRaw('COUNT(*) AS cuenta')
                                ->where('departure', 'LIKE', 'SA%')
                                ->where('destination', 'LIKE', 'SA%')
                                ->whereBetween('dt', [$request->f1, $request->f2])
                                ->first()->cuenta;
            $vuelosInternacionales = OnlineFlight::selectRaw('COUNT(*) AS cuenta')
                                ->where('departure', 'NOT LIKE', 'SA%')
                                ->orWhere('destination', 'NOT LIKE', 'SA%')
                                ->whereBetween('dt', [$request->f1, $request->f2])
                                ->first()->cuenta;
            $horasNacionales = OnlineFlight::selectRaw('SUM(online) AS suma')
                                ->where('departure', 'LIKE', 'SA%')
                                ->where('destination', 'LIKE', 'SA%')
                                ->whereBetween('dt', [$request->f1, $request->f2])
                                ->first()->suma;
            $horasInternacionales = OnlineFlight::selectRaw('SUM(online) AS suma')
                                ->where('departure', 'LIKE', 'SA%')
                                ->where('destination', 'LIKE', 'SA%')
                                ->whereBetween('dt', [$request->f1, $request->f2])
                                ->first()->suma;

            $vuelosTotales = $vuelosNacionales + $vuelosInternacionales;
            $horasTotales = $horasNacionales + $horasInternacionales;

            $aeropuertos = OnlineFlight::selectRaw('icao, SUM(online) AS suma')
                    ->join('airports', function($join){
                        $join->on('online_flights.departure', '=', 'airports.icao')
                             ->orOn('online_flights.destination', '=', 'airports.icao');
                    })
                    ->where('icao', 'LIKE', 'SA%')
                    ->whereBetween('dt', [$request->f1, $request->f2])
                    ->groupBy('icao')
                    ->orderBy('suma', 'DESC')
                    ->limit($request->limit)
                    ->get();
            $pilotos = OnlineFlight::selectRaw('vid, SUM(online) AS suma')
                    ->whereBetween('dt', [$request->f1, $request->f2])
                    ->groupBy('vid')
                    ->orderBy('suma', 'DESC')
                    ->limit($request->limit)
                    ->get();
            $nacionales = OnlineFlight::selectRaw('departure, destination, COUNT(*) AS cuenta')
                    ->where('departure', 'LIKE', 'SA%')
                    ->where('destination', 'LIKE', 'SA%')
                    ->whereBetween('dt', [$request->f1, $request->f2])
                    ->groupBy('departure')->groupBy('destination')
                    ->orderBy('cuenta', 'DESC')
                    ->limit($request->limit)
                    ->get();
            $internacionales = OnlineFlight::selectRaw('departure, destination, COUNT(*) AS cuenta')
                    ->where('departure', 'NOT LIKE', 'SA%')
                    ->orWhere('destination', 'NOT LIKE', 'SA%')
                    ->whereBetween('dt', [$request->f1, $request->f2])
                    ->groupBy('departure')->groupBy('destination')
                    ->orderBy('cuenta', 'DESC')
                    ->limit($request->limit)
                    ->get();
            $aerolineas = OnlineFlight::selectRaw('SUBSTRING(callsign,1,3) AS airline, COUNT(callsign) AS cuenta')
                    ->join('va_list', 'icao', '=', DB::raw('SUBSTRING(callsign, 1, 3)'))
                    ->whereBetween('dt', [$request->f1, $request->f2])
                    ->groupBy('airline')
                    ->orderBy('cuenta', 'DESC')
                    ->get();

            return view('intraweb.Vuelo.stats.list', compact('user', 'staffMembers', 'isADM', 'vuelosNacionales', 'vuelosInternacionales', 'horasNacionales', 'horasInternacionales', 'horasTotales', 'vuelosTotales', 'aeropuertos', 'pilotos', 'nacionales', 'internacionales', 'aerolineas'));
        }
        else
        {
            return view('intraweb.Vuelo.stats.formStats', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function FIRStats(Request $request)
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(! empty($request->all()))
        {
            $firChiefs = OnlineATC::selectRaw('name, fir, SUM(online) AS suma')
            ->join('staff_members', 'online_atcs.vid', '=', 'staff_members.vid')
            ->join('atc_positions', 'online_atcs.callsign', '=', 'atc_positions.posid')
            ->whereRaw('SUBSTRING(position,1,4) = SUBSTRING(PosId,1,4)')
            ->whereRaw("DATE(dt) BETWEEN '?' AND '?'", [$request->f1, $request->f2])
            ->where('department', 'FIR')
            ->groupBy('name', 'fir')
            ->orderBy('suma', 'DESC')
            ->get();

            $firUsers = OnlineATC::selectRaw('staff_members.vid, SUM(online) AS suma')
            ->join('staff_members', 'online_atcs.vid', '=', 'staff_members.vid')
            ->whereBetween('dt', [$request->f1, $request->f2])
            ->where('department', 'FIR')
            ->groupBy('staff_members.vid')
            ->orderBy('suma', 'DESC')
            ->get();

            return view('intraweb.ATC.stats.listFIRstats', compact('user', 'staffMembers', 'isADM', 'firChiefs', 'firUsers'));
        }
        else
        {
            return view('intraweb.ATC.stats.formFIRStats', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function ATCFIRStats(Request $request)
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(! empty($request->all()))
        {
            $ATCHours = OnlineATC::selectRaw('online_atcs.vid AS vid, atc_positions.FIR AS fir, SUM(online) AS suma')
            ->join('users', 'online_atcs.vid', '=', 'users.vid')
            ->join('atc_positions', 'online_atcs.callsign', '=', 'atc_positions.PosId')
            ->whereBetween('dt', [$request->f1, $request->f2])
            ->where('online_atcs.vid', $request->vid)
            ->groupBy('online_atcs.vid')
            ->groupBy('atc_positions.FIR')
            ->orderBy('suma', 'DESC')
            ->get();

            return view('intraweb.ATC.stats.listATCFIRstats', compact('user', 'staffMembers', 'isADM', 'ATCHours'));
        }
        else
        {
            return view('intraweb.ATC.stats.formATCFIRStats', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function FlightHourlyStats(Request $request)
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(! empty($request->all()))
        {
            $dias = CountFlight::selectRaw('Weekday, WD_id, AVG(Count) AS cuenta')
                                ->whereBetween('intstart', [$request->f1, $request->f2])
                                ->whereBetween('intfinish', [$request->f1, $request->f2])
                                ->groupBy('WD_id')
                                ->orderBy('WD_id')
                                ->get();
            $horas = CountFlight::selectRaw('Inter, AVG(Count) AS cuenta')
                                ->whereBetween('intstart', [$request->f1, $request->f2])
                                ->whereBetween('intfinish', [$request->f1, $request->f2])
                                ->groupBy('Inter')
                                ->orderBy('Inter')
                                ->get();

            return view('intraweb.Vuelo.stats.listHourly', compact('user', 'staffMembers', 'isADM', 'dias', 'horas'));
        }
        else
        {
            return view('intraweb.Vuelo.stats.formHourlyStats', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function VAParticipation(Request $request)
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(! empty($request->all()))
        {
            $aerolineas = OnlineFlight::selectRaw('SUBSTRING(callsign,1,3) AS airline, COUNT(callsign) AS cuenta')
            ->join('va_list', 'icao', '=', DB::raw('SUBSTRING(callsign, 1, 3)'))
            ->whereBetween('dt', [$request->f1, $request->f2])
            ->groupBy('airline')
            ->orderBy('cuenta', 'DESC')
            ->get();

            return view('intraweb.Vuelo.stats.listVA', compact('user', 'staffMembers', 'isADM', 'aerolineas'));
        }
        else
        {
            return view('intraweb.Vuelo.stats.formVAStats', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function topFive()
    {
        $tops = OnlineATC::selectRaw('vid, SUM(online) AS suma')
        ->whereRaw('MONTH(dt) = MONTH(NOW())')
        ->whereRaw('YEAR(dt) = YEAR(NOW())')
        ->groupBy('vid')
        ->orderBy('suma', 'DESC')
        ->limit(5)
        ->get();

        echo '<table class="table table-bordered w-100 p-0">'
            .'<thead class="thead-dark">'
            .'<tr>'
            .'<th>VID</th>'
            .'<th>Time</th>'
            .'</tr>'
            .'</thead>'
            .'<tbody>';

        foreach ($tops as $top)
        {
            echo '<tr>'
                .'<td><a target="_blank" href="https://www.ivao.aero/Member.aspx?Id='.$top->vid.'">'.$top->vid.'</a></td>'
                .'<td>'.$this->obtenerHorasMinutos($top->suma).'</td>'
                .'</tr>';
        }

        echo '</tbody>'
            .'</table>';
    }

    private function obtenerHorasMinutos($secs) { return sprintf('%d h %d mins', floor($secs/3600), ($secs/60) % 60); }
}