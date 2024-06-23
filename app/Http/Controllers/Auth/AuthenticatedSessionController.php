<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->jenis_akun === 'super_admin') {
                return redirect()->intended(route('Dashboard.Admin'));
            } elseif (auth()->user()->jenis_akun === 'siswa') {
                return redirect()->intended(route('Dashboard.Siswa'));
            } elseif (auth()->user()->jenis_akun === 'pengajar') {
                return redirect()->intended(route('Dashboard.Pengajar'));
            } elseif (auth()->user()->jenis_akun === 'pendaftar') {
                return redirect()->intended(route('Dashboard.Pendaftar'));
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
