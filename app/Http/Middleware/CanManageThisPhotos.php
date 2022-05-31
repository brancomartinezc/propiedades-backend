<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Photo;

class CanManageThisPhotos
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
        $user_id = auth()->user()->id;
        $user_role = auth()->user()->role;

        if ($request->isMethod('post')) { //Upload
            $property = Property::find($request->prop_id);
        }else{ //Delete
            $photo = Photo::find($request->route('photo'));
            $property = Property::find($photo->property_id);
        }
        
        $publisher_agent_id = $property->agent_id;

        if($user_id == $publisher_agent_id || $user_role == "chief-agent" || $user_role == "admin"){
            return $next($request);
        }else{
            return response()->view('not-authorized');
        }

        return $next($request);
    }
}
