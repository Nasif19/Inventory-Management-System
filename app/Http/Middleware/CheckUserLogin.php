<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class CheckUserLogin
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
        if(Session::has('userid') && Session::get('type')=='user')
            return $next($request);
        else if(Session::has('userid') && Session::get('type')!='admin')
            return redirect()->to('login');
        else
            abort(404);
    }
}
