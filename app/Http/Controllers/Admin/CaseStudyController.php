<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CaseStudyController extends Controller
{
    public function index(): View
    {
        $caseStudies = collect(); // Placeholder: add CaseStudy model when needed

        return view('admin.case-studies.index', ['caseStudies' => $caseStudies]);
    }

    public function show(int $caseStudy): View
    {
        abort(404, 'Case study – add model when needed.');
    }

    public function edit(int $caseStudy): View
    {
        abort(404, 'Case study edit – add model when needed.');
    }

    public function update(Request $request, int $caseStudy): RedirectResponse
    {
        return redirect()->route('admin.case-studies.index');
    }
}
