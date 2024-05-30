<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            if ($request->user()->jenis_akun === 'admin') {
                return redirect()->intended(route('Dashboard.Admin'));
            } elseif ($request->user()->jenis_akun === 'siswa') {
                return redirect()->intended(route('Dashboard.Siswa'));
            } elseif ($request->user()->jenis_akun === 'pengajar') {
                return redirect()->intended(route('Dashboard.Pengajar'));
            }
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
