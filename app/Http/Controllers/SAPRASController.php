<?php

namespace App\Http\Controllers;

use App\Exports\SAPRASExport;
use App\Models\SAPRAS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class SAPRASController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = SAPRAS::paginate(100);

        return view('data.data_sarana_prasana', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_data.create_data_sarana_prasarana');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'jenis_fasilitas' => 'required',
            'nama_fasilitas' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
        ], [
            'jenis_fasilitas.required' => 'Jenis Fasilitas wajib diisi',
            'nama_fasilitas.required' => 'Nama Fasilitas wajib diisi',
            'jumlah.required' => 'Jumlah wajib diisi',
            'kondisi.required' => 'Kondisi wajib diisi',
            'status.required' => 'Status Wajib diisi',
        ]);

        $data = [
            'jenis_fasilitas' => $request->jenis_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas,
            'jumlah' => $request->jumlah,
            'kondisi' => $request->kondisi,
            'status' => $request->status,
        ];

        SAPRAS::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('SAPRAS.index')->with('success', 'Data Telah Tersimpan');
    }

    public function exportAllExcel()
    {
        return Excel::download(new SAPRASExport(), 'report_all_sarana_prasarana_bbu.xlsx');
    }

    public function exportPDF($id)
    {
        $data = SAPRAS::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_sarana_prasarana_bbu', compact('data'));

        return $pdf->download('sarana_prasarana.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = SAPRAS::findOrfail($id);
        return view('show_data.show_data_sarana_prasarana', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = SAPRAS::findOrfail($id);
        return view('edit_data.edit_data_sarana_prasarana', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = SAPRAS::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }

        $validasi = Validator::make($request->all(), [
            'jenis_fasilitas' => 'required',
            'nama_fasilitas' => 'required',
            'jumlah' => 'required',
            'kondisi' => 'required',
            'status' => 'required',
        ], [
            'jenis_fasilitas.required' => 'Jenis Fasilitas wajib diisi',
            'nama_fasilitas.required' => 'Nama Fasilitas wajib diisi',
            'jumlah.required' => 'Jumlah wajib diisi',
            'kondisi.required' => 'Kondisi wajib diisi',
            'status.required' => 'Status Wajib diisi',
        ]);

        $data = [];
        // Update data
        $model->update([
            'jenis_fasilitas' => $request->jenis_fasilitas,
            'nama_fasilitas' => $request->nama_fasilitas,
            'jumlah' => $request->jumlah,
            'status_sertifikat' => $request->status_sertifikat,
            'kondisi' => $request->kondisi,
            'status' => $request->status,
        ]);
        return redirect()->route('SAPRAS.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = SAPRAS::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('SAPRAS.destroy')->with('success', 'Data Telah Terhapus');
    }
}
