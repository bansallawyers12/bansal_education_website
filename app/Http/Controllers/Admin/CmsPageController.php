<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CmsPageController extends Controller
{
    public function index(): View
    {
        $pages = Page::query()->latest()->paginate(15);

        return view('admin.cms-pages.index', ['pages' => $pages]);
    }

    public function create(): View
    {
        return view('admin.cms-pages.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug'],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:512'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:500'],
            'is_published' => ['boolean'],
        ]);
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        Page::create($data);

        return redirect()->route('admin.cms-pages.index')->with('success', 'Page created.');
    }

    public function show(Page $cms_page): View
    {
        return view('admin.cms-pages.show', ['p' => $cms_page]);
    }

    public function edit(Page $cms_page): View
    {
        return view('admin.cms-pages.edit', ['p' => $cms_page]);
    }

    public function update(Request $request, Page $cms_page): RedirectResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:pages,slug,' . $cms_page->id],
            'meta_title' => ['nullable', 'string', 'max:255'],
            'meta_description' => ['nullable', 'string', 'max:512'],
            'body' => ['nullable', 'string'],
            'image' => ['nullable', 'string', 'max:500'],
            'is_published' => ['boolean'],
        ]);
        $data['slug'] = $data['slug'] ?? Str::slug($data['title']);
        $data['is_published'] = $request->boolean('is_published');

        $cms_page->update($data);

        return redirect()->route('admin.cms-pages.index')->with('success', 'Page updated.');
    }
}
