<?php

namespace Tests\Feature;

use App\Models\OutboundCall;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NotifyOutboundTest extends TestCase
{
    use RefreshDatabase;

    public function test_notify_records_mock_outbound_call(): void
    {
        config([
            'outbound.mode' => 'mock',
            'outbound.url' => 'mock://laravel-outbound/notify',
        ]);

        $response = $this->postJson('/api/v1/integrations/notify', [
            'title' => 'Payment retry failed',
            'message' => 'Timeout talking to PSP',
        ]);

        $response->assertCreated()
            ->assertJsonPath('ok', true)
            ->assertJsonPath('outboundCall.target_url', 'mock://laravel-outbound/notify')
            ->assertJsonPath('outboundCall.status_code', 200)
            ->assertJsonPath('outboundCall.response_body.mocked', true);

        $this->assertDatabaseCount('outbound_calls', 1);
        $this->assertSame(1, OutboundCall::query()->count());
    }

    public function test_health_reports_database_up(): void
    {
        $this->getJson('/api/v1/health')
            ->assertOk()
            ->assertJsonPath('status', 'ok')
            ->assertJsonPath('database', 'up');
    }
}
