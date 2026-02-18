<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AppointmentController extends Controller
{
    public function index(): View
    {
        $appointments = collect(); // Placeholder: add Appointment model when needed

        return view('admin.appointments.index', ['appointments' => $appointments]);
    }

    public function create(): View
    {
        return view('admin.appointments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        // Placeholder: store to appointments table when migration/model exist
        return redirect()->route('admin.appointments.index')->with('success', 'Appointment created.');
    }
}
