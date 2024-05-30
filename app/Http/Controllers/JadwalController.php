<?php

namespace App\Http\Controllers;

use App\Exports\JadwalExport;
use App\Models\Jadwal;
use App\Models\MataPelajaran;
use App\Models\Pengajar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jadwal::with('Pengajar', 'MataPelajaran')->paginate(100);

        return view('data.data_jadwal', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_pelajaran = MataPelajaran::all();
        $pengajar = Pengajar::all();
        return view('create_data.create_data_jadwal', compact('mata_pelajaran', 'pengajar'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'tanggal' => 'required',
            'nomor_urut_peserta' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'id_mata_pelajaran' => 'required',
            'id_pengajar' => 'required',
        ], [
            'tanggal.required' => 'Tanggal wajib diisi',
            'nomor_urut_peserta.required' => 'Nomor urut peserta wajib diisi',
            'hari.required' => 'Hari wajib diisi',
            'jam.required' => 'Jam wajib diisi',
            'id_mata_pelajaran.required' => 'Mata Pelajaran wajib diisi',
            'id_pengajar.required' => 'Pengajar wajib diisi',
        ]);
        $data = [
            'tanggal' => $request->tanggal,
            'nomor_urut_peserta' => $request->nomor_urut_peserta,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'id_pengajar' => $request->id_pengajar,
        ];
        Jadwal::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Jadwal.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengajar = Pengajar::all();
        $mata_pelajaran = MataPelajaran::all();
        $data = Jadwal::findOrfail($id);
        return view('show_data.show_data_jadwal', compact('data', 'mata_pelajaran', 'pengajar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengajar = Pengajar::all();
        $mata_pelajaran = MataPelajaran::all();
        $data = Jadwal::findOrfail($id);
        return view('edit_data.edit_data_jadwal', compact('data', 'mata_pelajaran', 'pengajar'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new JadwalExport(), 'report_all_jadwal.xlsx');
    }

    public function exportPDF($id)
    {
        $data = Jadwal::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_jadwal', compact('data'));

        return $pdf->download('data_jadwal_.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = Jadwal::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'tanggal' => 'required',
            'nomor_urut_peserta' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'id_mata_pelajaran' => 'required',
            'id_pengajar' => 'required',
        ], [
            'tanggal.required' => 'Tanggal wajib diisi',
            'nomor_urut_peserta.required' => 'Nomor urut peserta wajib diisi',
            'hari.required' => 'Hari wajib diisi',
            'jam.required' => 'Jam wajib diisi',
            'id_mata_pelajaran.required' => 'Mata Pelajaran wajib diisi',
            'id_pengajar.required' => 'Pengajar wajib diisi',
        ]);
        $model->update([
            'tanggal' => $request->tanggal,
            'nomor_urut_peserta' => $request->nomor_urut_peserta,
            'hari' => $request->hari,
            'jam' => $request->jam,
            'id_pengajar' => $request->id_pengajar,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
        ]);
        return redirect()->route('Jadwal.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Jadwal::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('Jadwal.index')->with('success', 'Data Telah Terhapus');
    }
}
