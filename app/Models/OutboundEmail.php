<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OutboundEmail extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'message_id',
        'from_address',
        'from_name',
        'to_address',
        'subject',
        'status',
        'sent_at',
        'body_text',
        'body_html',
    ];

    protected function casts(): array
    {
        return [
            'sent_at' => 'datetime',
        ];
    }

    public const STATUS_DRAFT = 'draft';
    public const STATUS_PENDING = 'pending';
    public const STATUS_SENT = 'sent';
    public const STATUS_FAILED = 'failed';
}
