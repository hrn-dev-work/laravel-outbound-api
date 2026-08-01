<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OutboundCall extends Model
{
    protected $fillable = [
        'target_url',
        'status_code',
        'request_body',
        'response_body',
    ];

    protected function casts(): array
    {
        return [
            'request_body' => 'array',
            'response_body' => 'array',
        ];
    }
}
