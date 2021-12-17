<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\StaffAction, App\Models\StaffMember;
use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function list($filter)
    {
        $cambios = NULL;

        if($filter == 0)
        {
            $cambios = StaffAction::orderBy('date', 'DESC')->paginate(20);
        }
        else if(is_numeric($filter))
        {
            $cambios = StaffAction::where('vid', $filter)
                        ->orderBy('date', 'DESC')
                        ->paginate(20);
        }
        else 
        {
            $cambios = StaffAction::join('staff_members', 'staff_actions.vid', '=', 'staff_members.vid')
                        ->select('staff_actions.*')
                        ->where('staff_members.department', $filter)
                        ->orderBy('date', 'DESC')
                        ->paginate(20);
        }

        $user = Auth::user();
        $staffs = StaffMember::select('vid', 'name')->orderBy('vid')->distinct()->get();
        $departamentos = StaffMember::select('department')->orderBy('department')->distinct()->get();
        $staffMembers = StaffMember::where('vid', $user->vid)->get();
        $staffMembersADM = StaffMember::where('vid', $user->vid) 
                                        ->where('permissions', 'ADM')
                                        ->get();
        $isADM = count($staffMembersADM) > 0;

        return view('intraweb.HQ.cambios.list', compact('user', 'staffMembers', 'isADM', 'cambios', 'staffs', 'departamentos'));
    }
}
