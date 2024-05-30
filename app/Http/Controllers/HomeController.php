<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('home.admin');
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
}
