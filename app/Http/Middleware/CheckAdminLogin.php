<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->check() && auth()->user()->status == 1) {
            
            if(auth()->id() == 1) return $next($request);
            
            $role_user = User::findOrFail(auth()->id())->role;

            if(!empty($role_user->status) && $role_user->status != 1) {

                auth()->logout();
                return redirect()->route('index.home');
                
            }

            return $next($request);

        }

        auth()->logout();

        return redirect()->route('get.login')->withErrors('Vui lòng đăng nhập');
    }
}
