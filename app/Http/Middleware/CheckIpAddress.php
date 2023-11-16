<?php

namespace App\Http\Middleware;

use App\Models\IpAddress;
use Closure;
use Illuminate\Support\Facades\Config;

class CheckIpAddress
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next){
        $userIp = $request->ip();
        $checkIp = Ipaddress::where('ipaddress', $userIp)->first();
        if(!$checkIp){
            Ipaddress::Create([
                'ipaddress' => $userIp,
                'hrms' => now()
            ]);
        }
        else{
            $checkIp->update([
                'ipaddress' => $userIp,
                'hrms' => now()
            ]);
        }

        return $next($request);

        $allowedIps = Config::get('ip_whitelist.allowed_ips');
        if(in_array($userIp, $allowedIps)){
            return $next($request);
        }

        if(env('APP_MAINTENANCE') == 'true'){
            abort(403, 'THIS SITE IS UNDER MAINTENANCE');
        }
        else{
            abort(403, 'Unauthorized IP address');
        }
    }
}
