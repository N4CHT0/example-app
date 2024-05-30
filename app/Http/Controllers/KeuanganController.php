<?php

namespace App\Http\Controllers;

use App\Exports\KeuanganExport;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class KeuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Keuangan::paginate(100);

        return view('data.data_keuangan_bbu', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan ID terakhir dari data Keuangan
        $lastId = Keuangan::latest()->value('id');

        // Generate nomor bukti
        $nomor_bukti = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT) . '/I/INV/BharunaBhakti Utama - ' . date('Y');

        // Mengirimkan variabel $nomor_bukti ke tampilan
        return view('create_data.create_data_keuangan_bbu', ['nomor_bukti' => $nomor_bukti]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'tanggal_pembayaran' => 'required',
            'nama' => 'required',
            'berita_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'jumlah_uang' => 'required',
            'petugas' => 'required',
        ], [
            'tanggal_pembayaran.required' => 'Tanggal Pembayaran wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'berita_pembayaran.required' => 'Berita Pembayaran wajib diisi',
            'status_pembayaran.required' => 'Status Pembayaran wajib diisi',
            'jumlah_uang.required' => 'Jumlah Uang Wajib diisi',
            'petugas.required' => 'Petugas wajib diisi',
        ]);

        // Mendapatkan ID terakhir dari data Keuangan
        $lastId = Keuangan::latest()->value('id');

        // Generate nomor bukti
        $nomor_bukti = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT) . '/I/INV/BharunaBhakti Utama - ' . date('Y');

        // Simpan data ke database
        $data = [
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'nomor_bukti' => $nomor_bukti,
            'status_pembayaran' => $request->status_pembayaran,
            'berita_pembayaran' => $request->berita_pembayaran,
            'jumlah_uang' => $request->jumlah_uang,
            'nama' => $request->nama,
            'petugas' => $request->petugas,
        ];
        Keuangan::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Keuangan.index')->with('success', 'Data Telah Tersimpan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Keuangan::findOrfail($id);
        return view('show_data.show_data_keuangan', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Keuangan::findOrfail($id);
        return view('edit_data.edit_data_keuangan', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new KeuanganExport(), 'report_all_keuangan.xlsx');
    }

    public function exportPDF($id)
    {
        $data = Keuangan::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_keuangan_bbu', compact('data'));

        return $pdf->download('kwitansi_pembayaran_.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = Keuangan::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'tanggal_pembayaran' => 'required',
            'nama' => 'required',
            'berita_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'jumlah_uang' => 'required',
            'petugas' => 'required',
        ], [
            'tanggal_pembayaran.required' => 'Tanggal Pembayaran wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'berita_pembayaran.required' => 'Berita Pembayaran wajib diisi',
            'status_pembayaran.required' => 'Status Pembayaran wajib diisi',
            'jumlah_uang.required' => 'Jumlah Uang wWjib diisi',
            'petugas.required' => 'Petugas wajib diisi',
        ]);
        $model->update([
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'nomor_bukti' => $request->nomor_bukti,
            'status_pembayaran' => $request->status_pembayaran,
            'berita_pembayaran' => $request->berita_pembayaran,
            'jumlah_uang' => $request->jumlah_uang,
            'nama' => $request->nama,
            'petugas' => $request->petugas,
        ]);
        return redirect()->route('Keuangan.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Keuangan::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('Keuangan.index')->with('success', 'Data Telah Terhapus');
    }
}
