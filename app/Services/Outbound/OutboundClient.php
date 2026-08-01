<?php

namespace App\Services\Outbound;

use App\Models\OutboundCall;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class OutboundClient
{
    public function notify(string $title, string $message): OutboundCall
    {
        $mode = (string) config('outbound.mode', 'mock');
        $url = (string) config('outbound.url');
        $timeoutMs = (int) config('outbound.timeout_ms', 5000);
        $payload = [
            'event' => 'integration.notify',
            'title' => $title,
            'message' => $message,
        ];

        if ($mode === 'mock') {
            $target = $url !== '' ? $url : 'mock://laravel-outbound/notify';

            return OutboundCall::query()->create([
                'target_url' => $target,
                'status_code' => 200,
                'request_body' => $payload,
                'response_body' => ['mocked' => true],
            ]);
        }

        if ($mode !== 'http') {
            throw new RuntimeException("Unsupported OUTBOUND_MODE: {$mode}");
        }

        if ($url === '' || str_starts_with($url, 'mock://')) {
            throw new RuntimeException('OUTBOUND_URL must be an http(s) URL when OUTBOUND_MODE=http');
        }

        $response = Http::timeout(max(1, (int) ceil($timeoutMs / 1000)))
            ->acceptJson()
            ->asJson()
            ->post($url, $payload);

        return OutboundCall::query()->create([
            'target_url' => $url,
            'status_code' => $response->status(),
            'request_body' => $payload,
            'response_body' => $response->json() ?? ['raw' => $response->body()],
        ]);
    }
}
