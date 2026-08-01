<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class HealthController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $database = 'down';
        try {
            DB::connection()->getPdo();
            DB::select('select 1');
            $database = 'up';
        } catch (\Throwable) {
            $database = 'down';
        }

        return response()->json([
            'status' => $database === 'up' ? 'ok' : 'degraded',
            'database' => $database,
        ], $database === 'up' ? 200 : 503);
    }
}
