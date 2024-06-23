<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'id' => ['required', 'string', 'max:17', 'regex:/^[0-9]+$/', 'unique:users,id'],
            'nama_lengkap' => ['required', 'string', 'max:255'],
            'tempat_lahir' => ['required', 'string', 'max:255'],
            'tanggal_lahir' => ['required', 'date'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'captcha' => 'required|captcha',
        ]);

        $user = User::create([
            'id' => $request->id,
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_akun' => 'pendaftar',
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($request->user()->jenis_akun === 'super_admin') {
            return redirect()->intended(route('Dashboard.Admin'));
        } elseif ($request->user()->jenis_akun == 'siswa') {
            return redirect()->intended(route('Dashboard.Siswa'));
        } elseif ($request->user()->jenis_akun == 'pengajar') {
            return redirect()->intended(route('Dashboard.Pengajar'));
        } elseif ($request->user()->jenis_akun == 'pendaftar') {
            return redirect()->intended(route('Dashboard.Pendaftar'));
        }
        return redirect(route('dashboard', absolute: false));
    }
}
