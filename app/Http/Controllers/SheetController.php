<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Sheet, App\Models\StaffMember, App\Models\User;
use Illuminate\Http\Request;

class SheetController extends Controller
{
    public function list()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $sheets = Sheet::select('sheets.id', 'sheets.icao', 'airports.name', 'airports.city', 'sheets.fir', 'sheets.version')
                        ->join('airports', 'sheets.icao', '=', 'airports.icao')
                        ->orderBy('sheets.icao')
                        ->get();

        return view('intraweb.ATC.fichas.list', compact('user', 'staffMembers', 'isADM', 'sheets'));
    }

    public function add(Request $request)
    {
        if(! empty($request->all()))
        {
            $sheet = new Sheet();
            $sheet->icao = $request->icao;
            $sheet->fir = $request->fir;
            $sheet->version = $request->version;

            $newName = $sheet->icao.'_v'.$sheet->version.'.pdf';

            if($request->archivo->storeAs('ATC/Fichas', $newName, 'files'))
            {
                if($sheet->save()) flash()->success('Ficha Agregada')->important();
                else flash()->error($sheet->errors()->first())->important();
            }
            else flash()->error('El archivo no ha podido cargarse al servidor.')->important();

            return redirect()->action('SheetController@list');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.ATC.fichas.add', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function delete($id)
    {
        if(! Auth::check()) return redirect('/error/401');

        $sheet = Sheet::find($id);

        if($sheet->delete()) flash()->success('Ficha eliminada')->important();
        else flash()->error($sheet->errors()->first())->important();

        return redirect()->action('SheetController@list');
    }
}
