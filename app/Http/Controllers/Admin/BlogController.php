<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function categories(): View
    {
        $categories = collect(); // Placeholder: add BlogCategory model when needed

        return view('admin.blogs.categories', ['categories' => $categories]);
    }

    public function categoriesCreate(): View
    {
        return view('admin.blogs.categories-create');
    }

    public function categoriesStore(Request $request): RedirectResponse
    {
        return redirect()->route('admin.blogs.categories')->with('success', 'Category created.');
    }

    public function categoriesEdit(int $id): View
    {
        abort(404, 'Blog category edit – add model when needed.');
    }

    public function posts(): View
    {
        $posts = collect();

        return view('admin.blogs.posts', ['posts' => $posts]);
    }
}
