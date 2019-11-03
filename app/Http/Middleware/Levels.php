<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;
use App\Entities\PostType;
use App\Entities\ProjectType;

class Levels
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$levels)
    {
        // check level access
        if(count($levels) > 0)
            if(!in_array(Auth::user()->id_level, $levels)){
                return abort(403, 'Access denied');
            }
        
        View::share('postTypes', PostType::all());
        View::share('projectTypes', ProjectType::all());

        return $next($request);
    }
}
