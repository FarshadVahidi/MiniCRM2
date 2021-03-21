<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if($role == 'user' && !auth()->user()->hasRole('user'))
        {
            abort(403);
        }
        if($role == 'administrator' && !auth()->user()->hasRole('administrator'))
        {
            abort(403);
        }
        if($role == 'superadministrator' && !auth()->user()->hasRole('superadministrator')){
            abort(403);
        }
        return $next($request);
    }
}
