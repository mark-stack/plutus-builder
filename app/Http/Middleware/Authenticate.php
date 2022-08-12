<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Auth;

class Authenticate extends Middleware
{

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            if ( Auth::check() == false){
                return '/auth/redirect/google';
            }
            

            /*
            if ( Auth::check() == true && Auth::user()->isAdmin() == false){
                //return '/auth/redirect/google';
            }
            */
        }
    }
}
