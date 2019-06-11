<?php

namespace App\Http\Middleware\Admin;

use App\Models\AdminType;
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
        $admin = Auth::guard('admin')->user();
        if (!$admin) {
            return response()->json(
                ['error' => 1, 'errmsg' => '请登录'], 401
            );
        }
        $request->admin = $admin;
        return $next($request);
    }

}
