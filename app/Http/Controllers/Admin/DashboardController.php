<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        $sitePages = Page::whereIn('slug', Page::SITE_PAGE_SLUGS)
            ->orderByRaw("FIELD(slug, 'home', 'about', 'courses', 'services', 'testimonials', 'contact')")
            ->get();

        return view('admin.dashboard', ['sitePages' => $sitePages]);
    }
}
