<?php

namespace App\Http\Middleware\Front;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::guard('front')->user();
        if ($user) {
            $request->user = $user;
            return $next($request);
        }
        return response()->json(['error' => 1, 'errmsg' => '请登录'], 401);
    }
}
