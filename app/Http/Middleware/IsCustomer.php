<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;

class IsCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(in_array(auth()->user()->role_id, [User::IS_PHOTO, User::IS_VIDEO])) {
            return redirect((route('studio.dashboard', auth()->user()->username)));
        }
        return $next($request);
    }
}
