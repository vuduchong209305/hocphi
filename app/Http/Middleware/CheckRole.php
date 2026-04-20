<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->id() == 1) return $next($request);

        $role = auth()->user()->role;
        
        if(empty($role)) return redirect()->route('403');

        $route = $request->route()->getName();
        
        $permission = explode(';', $role->permission);

        return in_array($route, $permission) ? $next($request) : redirect()->route('403');
    }
}
