<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function admin()
    {
        $totalPengajar = DB::table('users')->where('jenis_akun', 'pengajar')->count();
        $totalPegawai = DB::table('users')->where('jenis_akun', 'admin')->count();
        $totalSiswa = DB::table('users')->where('jenis_akun', 'siswa')->count();
        return view('home.admin', compact('totalPegawai', 'totalSiswa', 'totalPengajar'));
    }

    public function siswa(Request $request)
    {
        return view('home.siswa', [
            'user' => $request->user(),
        ]);
    }

    public function pengajar(Request $request)
    {
        return view('home.pengajar', [
            'user' => $request->user(),
        ]);
    }

    public function pendaftar(Request $request)
    {
        return view('home.pendaftar', [
            'user' => $request->user(),
        ]);
    }
}
