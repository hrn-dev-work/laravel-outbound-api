<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OutboundCall;
use App\Services\Outbound\OutboundClient;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotifyController extends Controller
{
    public function store(Request $request, OutboundClient $client): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:200'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $call = $client->notify($data['title'], $data['message']);

        return response()->json([
            'ok' => true,
            'outboundCall' => $call,
        ], 201);
    }

    public function index(): JsonResponse
    {
        return response()->json(
            OutboundCall::query()->latest('id')->limit(50)->get()
        );
    }
}
