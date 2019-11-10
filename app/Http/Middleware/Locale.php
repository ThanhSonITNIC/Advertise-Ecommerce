<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class Locale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        app()->setLocale(Session::get('my_language', config('app.locale')));

        return $next($request);
    }
}
