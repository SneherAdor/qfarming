<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $permission = null)
    {
        
        
        if(Auth::guest())
        {
            return redirect()->to('login');
        }
        /*
         * Check the user role
         * */
        
        if (!$request->user()->hasRole($role))
        {
            abort(404);
        }

        /*
         * Check the Individual Permission
         * */
        if ($permission !== null && !$request->user()->can($permission))
        {
            abort(404);
        }
        return $next($request);
    }
}
