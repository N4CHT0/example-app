<?php

namespace App\Http\Controllers;

use App\Exports\MataPelajaranExport;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MataPelajaran::paginate(100);

        return view('data.data_mata_pelajaran', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_data.create_data_mata_pelajaran');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'nama_mata_pelajaran' => 'required',
            'jenis_diklat' => 'required',
        ], [
            'nama_mata_pelajaran.required' => 'Nama Mata Pelajaran wajib diisi',
            'jenis_diklat.required' => 'Jenis Diklat wajib diisi',
        ]);
        $data = [
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
            'jenis_diklat' => $request->jenis_diklat,
        ];
        MataPelajaran::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('MataPelajaran.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = MataPelajaran::findOrfail($id);
        return view('show_data.show_data_mata_pelajaran', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = MataPelajaran::findOrfail($id);
        return view('edit_data.edit_data_mata_pelajaran', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new MataPelajaranExport(), 'report_all_mata_pelajaran.xlsx');
    }

    public function exportPDF($id)
    {
        $data = MataPelajaran::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_mata_pelajaran', compact('data'));

        return $pdf->download('mata_pelajaran_.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = MataPelajaran::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'nama_mata_pelajaran' => 'required',
            'jenis_diklat' => 'required',
        ], [
            'nama_mata_pelajaran.required' => 'Tanggal Pembayaran wajib diisi',
            'jenis_diklat.required' => 'Berita Pembayaran wajib diisi',
        ]);
        $model->update([
            'nama_mata_pelajaran' => $request->nama_mata_pelajaran,
            'jenis_diklat' => $request->jenis_diklat,
        ]);
        return redirect()->route('MataPelajaran.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = MataPelajaran::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('Keuangan.index')->with('success', 'Data Telah Terhapus');
    }
}
