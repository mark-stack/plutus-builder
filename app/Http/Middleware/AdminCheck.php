<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminCheck{

    public function handle($request, Closure $next){
        
        if(Auth::check()){

            // if user is not admin take him to his dashboard
            if ( Auth::user()->isUser() ) {
                 return redirect('/scripts');
            }

            // allow admin to proceed with request
            else if ( Auth::user()->isAdmin() ) {
                return $next($request);
            }
        }

        abort(404);  // for other user throw 404 error
    }
}
