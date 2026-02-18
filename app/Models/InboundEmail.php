<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InboundEmail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'message_id',
        'from_address',
        'to_address',
        'subject',
        'received_at',
        'status',
        'body_text',
        'body_html',
        'attachments',
        'headers',
    ];

    protected function casts(): array
    {
        return [
            'received_at' => 'datetime',
            'attachments' => 'array',
            'headers' => 'array',
        ];
    }

    public const STATUS_PENDING = 'pending';
    public const STATUS_PROCESSED = 'processed';
}
