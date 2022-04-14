<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Property;

class CanManageThisProperty
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
        //EN DESARROLLO
        /*$user_id = auth()->user()->id;
        $user_role = auth()->user()->role;
        $property = Property::find($request->id);
        $owner_id = $property->agent_id;

        if($user_id == $owner_id || $user_role == "chief-agent" || $user_role == "admin"){
            return $next($request);
        }else{
            return Redirect::back()->withErrors(['msg' => 'Not authorized.']);
        }*/

        return $next($request);
    }
}
