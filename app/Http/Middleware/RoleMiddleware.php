<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
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
        if (!(Auth::guest()) and ( Auth::user()->user_type_id == 2 or Auth::user()->user_type_id == 3 ){
            return $next($request);
        }
        else {
            return \Redirect::to('/');
        }
        
    }
}
