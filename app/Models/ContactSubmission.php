<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'subject',
        'message',
        'is_read',
    ];

    /** Full name for display (DB has first_name + last_name) */
    public function getFullNameAttribute(): string
    {
        return trim(($this->first_name ?? '') . ' ' . ($this->last_name ?? ''));
    }

    protected function casts(): array
    {
        return [
            'is_read' => 'boolean',
        ];
    }
}
