<?php

return [
    'mode' => env('OUTBOUND_MODE', 'mock'),
    'url' => env('OUTBOUND_URL', 'mock://laravel-outbound/notify'),
    'timeout_ms' => (int) env('OUTBOUND_TIMEOUT_MS', 5000),
];
