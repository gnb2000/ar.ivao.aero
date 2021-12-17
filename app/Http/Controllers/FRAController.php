<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\AtcPosition, App\Models\StaffMember, App\Models\User;
use Illuminate\Http\Request;

class FRAController extends Controller
{
    public function list()
    {
        $user = Auth::user();

        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $fras = AtcPosition::orderBy('PosId')->orderBy('FIR')->get();

        return view('intraweb.ATC.positions.list', compact('user', 'staffMembers', 'isADM', 'fras'));
    }

    public function add(Request $request)
    {
        if(!empty($request->all()))
        {
            $position = new AtcPosition();
            $position->PosId = $request->posicion;
            $position->PosName = $request->nombre;
            $position->FIR = $request->fir;
            $position->Freq = $request->frecuencia;

            if($position->save()) flash()->success('Posici&oacuten Agregada')->important();
            else flash()->error($position->errors()->first())->important();

            return redirect()->action('FRAController@list');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::where('vid', $user->vid)->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            return view('intraweb.ATC.positions.add', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function delete($pos)
    {
        if(! Auth::check()) return redirect('/error/401');

        $fra = AtcPosition::find($pos);

        if($fra->delete()) flash()->success('Posici&oacute;n eliminada')->important();
        else flash()->error($position->errors()->first())->important();

        return redirect()->action('FRAController@list');
    }
}
