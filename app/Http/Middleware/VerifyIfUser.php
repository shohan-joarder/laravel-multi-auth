<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class VerifyIfUser
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
        if (!Auth::guard('web')->check()) {
            if ($request->wantsJson()) {
                return response()->json(['Message', 'You do not access to this module.'], 403);
            }
            return redirect()->route('login');
        }
        return $next($request);
    }
}
