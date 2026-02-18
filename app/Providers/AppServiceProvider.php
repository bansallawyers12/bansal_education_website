<?php

namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** Route name => page slug for site pages (used for meta from admin). */
    protected array $routeToSlug = [
        'home' => 'home',
        'about' => 'about',
        'courses' => 'courses',
        'services' => 'services',
        'testimonials' => 'testimonials',
        'contact' => 'contact',
    ];

    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('layouts.app', function ($view) {
            $slug = $this->routeToSlug[request()->route()?->getName() ?? ''] ?? null;
            $sitePage = $slug ? Page::where('slug', $slug)->first() : null;
            $view->with('sitePage', $sitePage);
        });
    }
}
