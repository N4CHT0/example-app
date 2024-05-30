<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::paginate(100);

        return view('data.data_users', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_data.create_data_users');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jenis_akun' => 'required',
            'jenis_diklat' => 'required',
        ], [
            'nama_lengkap.required' => 'Jenis Fasilitas wajib diisi',
            'email.required' => 'Nama Fasilitas wajib diisi',
            'password.required' => 'Password wajib diisi',
            'jenis_akun.required' => 'Jenis Akun wajib diisi',
            'jenis_diklat.required' => 'Jenis Diklat Wajib diisi',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_akun' => $request->jenis_akun,
            'jenis_diklat' => $request->jenis_diklat,
        ];

        User::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Users.index')->with('success', 'Data Telah Tersimpan');
    }

    public function exportAllExcel()
    {
        return Excel::download(new UsersExport(), 'report_all_users_bbu.xlsx');
    }

    public function exportPDF($id)
    {
        $data = User::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_users', compact('data'));

        return $pdf->download('user_.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = User::findOrfail($id);
        return view('show_data.show_data_users', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = User::findOrfail($id);
        return view('edit_data.edit_data_users', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }

        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jenis_akun' => 'required',
            'jenis_diklat' => 'required',
        ], [
            'nama_lengkap.required' => 'Jenis Fasilitas wajib diisi',
            'email.required' => 'Nama Fasilitas wajib diisi',
            'password.required' => 'Password wajib diisi',
            'jenis_akun.required' => 'Jenis Akun wajib diisi',
            'jenis_diklat.required' => 'Jenis Diklat Wajib diisi',
        ]);

        $data = [];
        // Update data
        $model->update([
            'nama_lengkap' => $request->nama_lengkap,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'jenis_akun' => $request->jenis_akun,
            'jenis_diklat' => $request->jenis_diklat,
        ]);
        return redirect()->route('Users.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = User::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('User.destroy')->with('success', 'Data Telah Terhapus');
    }
}
