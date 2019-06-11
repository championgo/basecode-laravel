<?php

namespace App\Http\Middleware\Admin;

use Closure;

class AdministratorMiddleware
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
        if ($request->admin->role !== 0) {
            return response()->json(['error' => 1, 'errmsg' => '您没有权限操作'], 403);
        }
        return $next($request);
    }
}
