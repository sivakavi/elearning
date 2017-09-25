<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Auth\Role\Role;
use Illuminate\Support\Facades\Auth;

class Student
{
    use AuthorizesRequests;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $role = Role::where('name', 'student');
        if (Auth::user() &&  Auth::user()->hasRole($role)) {
            return $next($request);
        }

        return redirect('/');
    }
}
