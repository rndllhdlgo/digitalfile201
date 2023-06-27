<?php

namespace App\Http\Middleware;

use Closure;
use Jenssegers\Agent\Facades\Agent;

class CheckDevice
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
        if(Agent::isMobile()){
            return response()->make(view('pages.device'));
        }
        return $next($request);
    }
}
