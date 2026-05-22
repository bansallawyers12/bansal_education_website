<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Rules\Recaptcha;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLoginForm(): View
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $rules = [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];

        if (config('services.recaptcha.site_key') && config('services.recaptcha.secret_key')) {
            $rules['g-recaptcha-response'] = ['required', new Recaptcha];
        }

        $data = $request->validate($rules);

        $remember = $request->boolean('remember');

        if (! Auth::attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ], $remember)) {
            return back()->withErrors([
                'email' => __('The provided credentials do not match our records.'),
            ])->onlyInput('email');
        }

        $user = Auth::user();
        if (! $user->is_admin) {
            Auth::logout();
            return back()->withErrors([
                'email' => __('You do not have admin access.'),
            ])->onlyInput('email');
        }

        $request->session()->regenerate();
        return redirect()->intended(route('admin.dashboard'));
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
