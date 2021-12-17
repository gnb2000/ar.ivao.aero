<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

use App\Models\User, App\Models\StaffMember;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
        {
            $u = Auth::user();
            
            $isStaff = StaffMember::where('vid', $u->vid)->count() > 0;
            session(['vid' => $u->vid]);
            session(['name' => $u->name]);
            session(['surname' => $u->surname]);
            session(['isStaff' => $isStaff]);

            return redirect('/');
        }
        
        else return $next($request);
    }
}
