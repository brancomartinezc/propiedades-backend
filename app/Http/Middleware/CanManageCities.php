<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CanManageCities
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
        $user_role = auth()->user()->role;

        if($user_role == "chief-agent" || $user_role == "admin"){
            return $next($request);
        }else{
            return response()->view('not-authorized');
        }
    }
}
