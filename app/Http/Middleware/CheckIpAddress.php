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
    public function handle($request, Closure $next)
    {
        // Get the user's IP address
        $userIp = $request->ip();
        $checkIp = Ipaddress::where('ipaddress', $userIp)->first();
        if(!$checkIp){
            Ipaddress::Create([
                'ipaddress' => $userIp
            ]);
        }
        else{
            $checkIp->update([
                'ipaddress' => $userIp,
                'updated_at' => now()
            ]);
        }
        // Get the list of allowed IP addresses from the config
        $allowedIps = Config::get('ip_whitelist.allowed_ips');
        // return $next($request);

         // Check if the user's IP address is in the allowed list
        if(in_array($userIp, $allowedIps)){
            return $next($request);
        }
        abort(403, 'Unauthorized IP address');
    }
}
