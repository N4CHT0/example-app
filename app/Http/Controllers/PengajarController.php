<?php

namespace App\Http\Controllers;

use App\Exports\PengajarExport;
use App\Models\MataPelajaran;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pengajar::with('MataPelajaran')->paginate(100);

        return view('data.data_pengajar', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_pelajaran = MataPelajaran::all();
        return view('create_data.create_data_pengajar', compact('mata_pelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_pengajar' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'id_mata_pelajaran' => 'required',
        ], [
            'nama_pengajar.required' => 'Tanggal Pembayaran wajib diisi',
            'no_telp.required' => 'No Telp wajib diisi',
            'email.required' => 'Berita Pembayaran wajib diisi',
            'id_mata_pelajaran.required' => 'Mata Pelajaran wajib diisi',
        ]);
        $data = [
            'nama_pengajar' => $request->nama_pengajar,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
        ];
        Pengajar::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Pengajar.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mata_pelajaran = MataPelajaran::all();
        $data = Pengajar::findOrfail($id);
        return view('show_data.show_data_pengajar', compact('data', 'mata_pelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mata_pelajaran = MataPelajaran::all();
        $data = Pengajar::findOrfail($id);
        return view('edit_data.edit_data_pengajar', compact('data', 'mata_pelajaran'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new PengajarExport(), 'report_all_pengajar.xlsx');
    }

    public function exportPDF($id)
    {
        $data = Pengajar::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_pengajar', compact('data'));

        return $pdf->download('data_pengajar_.pdf');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = Pengajar::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'nama_pengajar' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'id_mata_pelajaran' => 'required',
        ], [
            'nama_pengajar.required' => 'Nama Pengajar wajib diisi',
            'no_telp.required' => 'No Telp wajib diisi',
            'email.required' => 'Email wajib diisi',
            'id_mata_pelajaran.required' => 'Mata Pelajaran wajib diisi',
        ]);
        $model->update([
            'nama_pengajar' => $request->nama_pengajar,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
        ]);
        return redirect()->route('Pengajar.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Pengajar::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('Pengajar.index')->with('success', 'Data Telah Terhapus');
    }
}
