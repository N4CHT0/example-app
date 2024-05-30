<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        if (!Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        $request->session()->put('auth.password_confirmed_at', time());

        if ($request->user()->jenis_akun === 'admin') {
            return redirect()->intended(route('Dashboard.Admin'));
        } elseif ($request->user()->jenis_akun === 'siswa') {
            return redirect()->intended(route('Dashboard.Siswa'));
        } elseif ($request->user()->jenis_akun === 'pengajar') {
            return redirect()->intended(route('Dashboard.Pengajar'));
        }
    }
}
