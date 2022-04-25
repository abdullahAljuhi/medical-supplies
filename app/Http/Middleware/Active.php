<?php

namespace App\Http\Middleware;

use App\Models\Pharmacy;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class Active
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(Pharmacy::find(auth()->user()->id())->is_active){
            return $next($request);

        }else{

            return "يرجى الانتظار حتى تفعيل الحساب";

        }
    }
}
