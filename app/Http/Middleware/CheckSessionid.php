<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Session;
use App\User;

class CheckSessionid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle(Request $request, Closure $next){
        if(Route::current()->getName() !== 'index_reload_data'){
            if (Auth::check()) {
                if(auth()->user()->session_id !== Session::getId()){
                    Auth::logout();
                    return redirect('/login?user=session');
                }
            }
        }
        return $next($request);
    }
}
