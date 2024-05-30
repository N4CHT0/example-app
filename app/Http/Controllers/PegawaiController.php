<?php

namespace App\Http\Controllers;

use App\Exports\PegawaiExport;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pegawai::paginate(100);

        return view('data.data_pegawai', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_data.create_data_pegawai');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'tempat_lahir.required' => 'Tempat Lahir wajib diisi',
            'email.required' => 'Email wajib diisi',
            'no_telp.required' => 'No Telp wajib diisi',
        ]);
        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'tanggal_lahir' => $request->tanggal_lahir,
            'tempat_lahir' => $request->tempat_lahir,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
        ];
        Pegawai::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Pegawai.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Pegawai::findOrfail($id);
        return view('show_data.show_data_pegawai', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pegawai::findOrfail($id);
        return view('edit_data.edit_data_pegawai', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new PegawaiExport(), 'report_all_pegawai.xlsx');
    }

    public function exportPDF($id)
    {
        $data = Pegawai::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_pegawai', compact('data'));

        return $pdf->download('data_pegawai_.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = Pegawai::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jabatan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap wajib diisi',
            'jabatan.required' => 'Jabatan wajib diisi',
            'tempat_lahir.required' => 'Tempat Lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'email.required' => 'Email wWjib diisi',
            'no_telp.required' => 'No Telp wajib diisi',
        ]);
        $model->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan' => $request->jabatan,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'no_telp' => $request->no_telp,
        ]);
        return redirect()->route('Pegawai.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Pegawai::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('Pegawai.index')->with('success', 'Data Telah Terhapus');
    }
}
