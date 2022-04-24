<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,string $type)
    {
        if($type =='user' && auth()->user()->type !=0){
            abort(403);
        }
        if($type =='admin' && auth()->user()->type !=1){
            abort(403);
        }  
        if($type =='pharmacy' && auth()->user()->type !=2){
            abort(403);
        }
        return $next($request);
    }
}
