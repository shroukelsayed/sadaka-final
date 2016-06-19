<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  int  $role
     * @return mixed
     */
    public function handle($request, Closure $next )
    {
        if (!(Auth::guest()) and Auth::user()->user_type_id == 1 and Auth::user()->approved == 1){
            return $next($request);
        }
        else {
            return \Redirect::to('/');
        }
        
    }
}
