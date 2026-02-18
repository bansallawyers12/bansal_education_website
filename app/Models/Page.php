<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'body',
        'image',
        'is_published',
        'meta',
    ];

    /** Slugs for the main site nav pages (editable in admin) */
    public const SITE_PAGE_SLUGS = ['home', 'about', 'courses', 'services', 'testimonials', 'contact'];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'meta' => 'array',
        ];
    }
}
