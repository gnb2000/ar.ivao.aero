<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\StaffMember, App\Models\StaffPosition, App\Models\User;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function list()
    {
        $user = Auth::user();
        $staffMembers = StaffMember::orderBy('department')
                                     ->orderBy('rank')
                                     ->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        return view('intraweb.HQ.staff.list', compact('user', 'staffMembers', 'isADM'));
    }

    public function add(Request $request)
    {
        if(!empty($request->all()))
        {
            $usuario = User::find($request->vid);
            $position = StaffPosition::find($request->position);

            $staffMember = new StaffMember();
            $staffMember->vid = $request->vid;
            $staffMember->name = $usuario->name.' '.$usuario->surname;
            $staffMember->email = strtolower($request->position).'@ivao.aero';
            $staffMember->position = $request->position;
            $staffMember->full_position = $position->PosNameEn;
            $staffMember->rank = $position->Rank;
            $staffMember->department = $position->Dept;

            $position->Vacant = 0;

            if($staffMember->save() && $position->save()) flash()->success('Staff Agregado')->important();
            else flash()->error($staffMember->errors()->first())->important();

            return redirect()->action('StaffController@list');
        }
        else
        {
            $user = Auth::user();
            $staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
            $staffMembersADM = StaffMember::where('vid', $user->vid)
                                            ->where('permissions', 'ADM')
                                            ->get();
            $isADM = count($staffMembersADM) > 0;

            $users = User::orderBy('vid')->get();
            $positions = StaffPosition::where('Vacant', '<>', 0)->get();

            return view('intraweb.HQ.staff.add', compact('user', 'users', 'staffMembers', 'isADM', 'positions'));
        }
    }
	
	public function listVacancy()
	{
		$user = Auth::user();
		$staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
		$staffMembersADM = StaffMember::where('vid', $user->vid)
										->where('permissions', 'ADM')
										->get();
		$isADM = count($staffMembersADM) > 0;

		$users = User::orderBy('vid')->get();
		$positions = StaffPosition::where('Vacant', 1)
							->whereNotNull('FinalVac')
							->get();

		return view('intraweb.HQ.vacantes.list', compact('user', 'users', 'staffMembers', 'isADM', 'positions'));
	}

    public function addVacancy(Request $request)
    {
        if(!empty($request->all()))
        {
            $fechaCierre = $request->tipo == 0 ? '0000-00-00' : $request->fecha;

            $position = StaffPosition::find($request->posicion);
			$position->FinalVac = $fechaCierre;
            /* $position->Vacant = $request->estado; */
            $position->Vacant = 1;
            $position->Text =  $request->texto;

            if($position->save()) flash()->success('Vacante Actualizada')->important();
            else flash()->error($staffMember->errors()->first())->important();

            return redirect()->action('StaffController@listVacancy');
        }
        else
        {
			$user = Auth::user();
			$staffMembers = StaffMember::orderBy('department')->orderBy('rank')->get();
			$staffMembersADM = StaffMember::where('vid', $user->vid)
										->where('permissions', 'ADM')
										->get();
			$isADM = count($staffMembersADM) > 0;

			$users = User::orderBy('vid')->get();

            $positions = StaffPosition::where('Vacant', 1)
								->whereNull('FinalVac')
								->get();

            return view('intraweb.HQ.vacantes.add', compact('positions','user','staffMembers','staffMembersADM','isADM','users'));
        }
    }
	
	public function deleteVacancy($pos)
    {
        if(! Auth::check()) return redirect('/error/401');
        $position = StaffPosition::find($pos);
        $position->Vacant = 1;
		$position->FinalVac = null;

        if($position->save()) flash()->success('Vacante eliminada')->important();
        else flash()->error($position->errors()->first())->important();

        return redirect()->action('StaffController@listVacancy');
    }
	
	
	

    public function delete($pos)
    {
        if(! Auth::check()) return redirect('/error/401');

        $staffMember = StaffMember::find($pos);
        $position = StaffPosition::find($staffMember->position);
        $position->Vacant = 1;

        if($position->save() && $staffMember->delete()) flash()->success('Staff eliminado')->important();
        else flash()->error($position->errors()->first())->important();

        return redirect()->action('StaffController@list');
    }
}
