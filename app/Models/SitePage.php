<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SitePage extends Model
{
    protected $fillable = [
        'slug',
        'type',
        'title',
        'nav_label',
        'eyebrow',
        'hero_title',
        'hero_subtitle',
        'hero_image',
        'intro_title',
        'intro_body',
        'content_html',
        'blocks',
        'faqs',
        'cta_label',
        'cta_url',
        'meta_title',
        'meta_description',
        'is_active',
        'show_in_nav',
        'show_in_footer',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'blocks' => 'array',
            'faqs' => 'array',
            'is_active' => 'boolean',
            'show_in_nav' => 'boolean',
            'show_in_footer' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}