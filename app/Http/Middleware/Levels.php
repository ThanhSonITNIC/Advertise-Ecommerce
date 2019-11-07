<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use View;
use App\Entities\PostType;
use App\Entities\ProjectType;
use App\Entities\Unit;
use App\Entities\Level;
use App\Entities\UserStatus;

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
        // check block
        if(Auth::user()->status->blocked()){
            return abort(403, 'Access denied - The account has been locked');
        }

        // check level access
        if(count($levels) > 0)
            if(!in_array(Auth::user()->id_level, $levels)){
                return abort(403, 'Access denied');
            }
        
        View::share('levels', Level::all());
        View::share('userStatuses', UserStatus::all());
        View::share('postTypes', PostType::all());
        View::share('projectTypes', ProjectType::all());
        View::share('units', Unit::all());

        return $next($request);
    }
}
