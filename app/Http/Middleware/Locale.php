<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Lang;
use Illuminate\Support\Facades\App;

class Locale
{
    public function handle(Request $request, Closure $next)
    {
        $lang_name = isset($_COOKIE['lang_name']) ? $_COOKIE['lang_name'] : config('app.locale');

        app()->setLocale($lang_name);

        return $next($request);
    }
}
