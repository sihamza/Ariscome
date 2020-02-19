<?php

namespace App\Http\Middleware;

use Closure;

class auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { /*
          if ( $request->session('user') ) {
            return $next($request) ;
          }
          return redirect('/authentication') ; */
    }
}
