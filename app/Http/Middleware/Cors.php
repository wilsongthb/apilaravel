<?php

namespace App\Http\Middleware;

use Closure;

class Cors
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
        return $next($request);
            // ->header('Access-Control-Allow-Origin', '*')
            // ->header('Access-Control-Allow-Methods', 'post, get, put, delete, options')
            // ->header('Access-Control-Allow-Methods', 'POST, GET, PUT, DELETE, OPTIONS')
            // ->header('Access-Control-Allow-Headers', 'Access-Control-Allow-Origin');
    }
}

/*

if (Request::is("api/*")) {

    Access-Control-Allow-Origin
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization, If-Modified-Since, Cache-Control, Pragma");
}
*/