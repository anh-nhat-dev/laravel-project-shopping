<?php

namespace App\Http\Middleware\Auth;

use Closure,Auth;

class CheckLogOut
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
        if (!Auth::guest()) {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
