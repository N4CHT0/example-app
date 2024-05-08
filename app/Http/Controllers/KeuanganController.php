<?php

namespace App\Http\Controllers;

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
            'jumlah_uang.required' => 'Jumlah Uang wWjib diisi',
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
