<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function ok($data = 'true', $total = 0)
    {
        return response()->json([
            'error' => 0,
            'errmsg' => 'ok',
            'data' => $data,
            'total' => $total
        ]);
    }

    public function fail($errmsg = '网络忙，请稍后再试...', $code = 200)
    {
        return response()->json([
            'error' => 1,
            'errmsg' => $errmsg,
        ], $code);
    }
}
