<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\StaffMember, App\Models\StaffPosition, App\Models\User, App\Models\VA, App\Models\ElitePilot;
use Illuminate\Http\Request;

class VAController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $VAs = VA::orderBy('IVAOId')->get();

        return view('intraweb.Vuelo.va.list', compact('user', 'staffMembers', 'isADM', 'VAs'));
    }

    public function add(Request $request)
    {
        $user = Auth::user();
        $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid)
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(!empty($request->all()))
        {
            $va = new VA();
            $va->IVAOId = $request->id;
            $va->ICAO = $request->icao;
            $va->IATA = $request->iata;
            $va->VaName = $request->nombre;
            $va->VaUrl = $request->url;
            $va->LogoUrl = $request->logo;
            $va->VaType = $request->tipo;

            if($va->save()) flash()->success('VA Agregada')->important();
            else flash()->error($va->errors()->first())->important();

            return redirect()->action('VAController@list');
        }
        else
        {
            return view('intraweb.Vuelo.va.add', compact('user', 'staffMembers', 'isADM'));
        }
    }

    public function activate($id)
    {
        $va = VA::find($id);
        $va->VaStatus = 1;

        if($va->save()) flash()->success('VA activada')->important();
        else flash()->error($va->errors()->first())->important();

        return redirect()->action('VAController@list');
    }

    public function deactivate($id)
    {
        $va = VA::find($id);
        $va->VaStatus = 0;

        if($va->save()) flash()->success('VA desactivada')->important();
        else flash()->error($va->errors()->first())->important();

        return redirect()->action('VAController@list');
    }

    public function delete($id)
    {
        if(! Auth::check()) return redirect('/error/401');

        $va = VA::find($id);

        if($va->delete()) flash()->success('VA eliminada')->important();
        else flash()->error($va->errors()->first())->important();

        return redirect()->action('VAController@list');
    }

    public function eliteList()
    {
        $user = Auth::user();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        $pilots = ElitePilot::orderBy('Callsign')->get();

        return view('intraweb.Vuelo.elite-pilots.list', compact('user', 'staffMembers', 'isADM', 'pilots'));
    }

    public function eliteAdd(Request $request)
    {
        $user = Auth::user();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid)
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        if(!empty($request->all()))
        {
            $pilot = new ElitePilot();
            $pilot->VID = $request->vid;
            $pilot->Callsign = $request->position;

            if($pilot->save()) flash()->success('Piloto Agregado')->important();
            else flash()->error($pilot->errors()->first())->important();

            return redirect()->action('VAController@eliteList');
        }
        else
        {
            $users = User::orderBy('vid')->get();
            return view('intraweb.Vuelo.elite-pilots.add', compact('user', 'staffMembers', 'isADM', 'users'));
        }
    }
    
    public function eliteDelete($vid)
    {
        if(! Auth::check()) return redirect('/error/401');

        $pilot = ElitePilot::find($vid);

        if($pilot->delete()) flash()->success('Piloto eliminado.')->important();
        else flash()->error($pilot->errors()->first())->important();

        return redirect()->action('VAController@eliteList');
    }
}
