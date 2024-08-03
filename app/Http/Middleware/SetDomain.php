<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $host = $request->getHost();
        $all = settings();

        if(!empty($all) && count($all)>0){
            foreach($all as $set){
                if(strpos($host, $set->domain) !== false){
                    session(['domain' => $set->domain]);
                }
            }
        }
        
        return $next($request);
    }
}
