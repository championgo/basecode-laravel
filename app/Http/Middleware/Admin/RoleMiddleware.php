<?php

namespace App\Http\Middleware\Admin;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {

/*        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (! $request->admin->hasAnyRole($roles)) {
            return response()->json(
                ['error' => 1, 'errmsg' => '用户没有权限'], 401
            );
//            throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);*/
    }
}
