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
        if(count($levels) > 0){
            // check level access
            if(!in_array(Auth::user()->id_level, $levels)){
                Auth::logout();
                return redirect(route('login'))->with('error', 'Access denied');
            }

            // check blocked
            if(Auth::user()->status->blocked()){
                Auth::logout();
                return redirect(route('login'))->with('error', 'Your account has been locked');
            }
        }
        
        View::share('levels', Level::all());
        View::share('userStatuses', UserStatus::all());
        View::share('postTypes', PostType::all());
        View::share('projectTypes', ProjectType::all());
        View::share('units', Unit::all());

        return $next($request);
    }
}
