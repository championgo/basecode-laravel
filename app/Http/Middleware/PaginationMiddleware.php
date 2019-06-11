<?php

namespace App\Http\Middleware;

use Closure;

class PaginationMiddleware
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
        $request->pageSize = $request->pageSize ?: 15;
        $request->page = $request->page ?: 1;
        // smart-table 格式重写
        if (empty($request->_limit) || $request->_limit > 15) {
            $request->_limit = 15;
        }
        $request->_sort = $request->_sort ?: 'created_at';
        $request->_order = $request->_order ?: 'desc';
        return $next($request);
    }
}
