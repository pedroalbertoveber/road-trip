<?php

namespace App\Http\Middleware;

use App\Models\Trip;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerifyUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next){

        $trip_owner_id = Trip::where('id', $request->trip_id)->first();
    
       if(Auth::user()->id == $trip_owner_id->user_id) {
            return $next($request);
       }
       
        return redirect(route('trips.index'));
    }
}
