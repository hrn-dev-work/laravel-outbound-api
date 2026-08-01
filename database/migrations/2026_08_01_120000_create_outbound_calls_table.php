<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('outbound_calls', function (Blueprint $table): void {
            $table->id();
            $table->string('target_url');
            $table->unsignedSmallInteger('status_code');
            $table->json('request_body');
            $table->json('response_body')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('outbound_calls');
    }
};
