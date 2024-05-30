<?php

namespace App\Http\Controllers;

use App\Exports\PesertaUjianExport;
use App\Models\PesertaUjian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PesertaUjianController extends Controller
{
    public function index()
    {
        $data = PesertaUjian::with('Users')->paginate(100);

        return view('data.data_peserta_ujian', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function getNama(Request $request)
    {
        $jenisDiklatYangDiinginkan = ['GMDSS', 'REOR'];
        $users = User::whereIn('jenis_diklat', $jenisDiklatYangDiinginkan);

        if ($search = $request->name) {
            $nama_lengkap = $users->where('nama_lengkap', 'LIKE', "%$search%")->get();
        } else {
            $nama_lengkap = $users->get();
        }

        return response()->json($nama_lengkap);
    }


    public function create()
    {
        $jenisDiklatYangDiinginkan = ['GMDSS', 'REOR'];
        $users = User::whereIn('jenis_diklat', $jenisDiklatYangDiinginkan)->get();
        return view('create_data.create_data_peserta_ujian', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_user' => 'required',
            'periode_ujian' => 'required',
            'status_peserta' => 'required',
            'nomor_peserta_ujian' => 'required',
            'angkatan' => 'required',
        ], [
            'id_user.required' => 'ID User wajib diisi',
            'periode_ujian.required' => 'Periode Ujian wajib diisi',
            'status_peserta.required' => 'Status Peserta wajib diisi',
            'nomor_peserta_ujian.required' => 'Nomor Peserta Ujian wajib diisi',
            'status_peserta.required' => 'Angkatan wajib diisi',
        ]);
        $data = [
            'id_user' => $request->id_user,
            'periode_ujian' => $request->periode_ujian,
            'status_peserta' => $request->status_peserta,
            'nomor_peserta_ujian' => $request->nomor_peserta_ujian,
            'angkatan' => $request->angkatan,
        ];
        PesertaUjian::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('PesertaUjian.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PesertaUjian::findOrfail($id);
        return view('show_data.show_data_peserta_ujian', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PesertaUjian::findOrfail($id);
        return view('edit_data.edit_data_peserta_ujian', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new PesertaUjianExport(), 'report_all_peserta_ujian.xlsx');
    }

    public function exportPDF($id)
    {
        $data = PesertaUjian::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_peserta_ujian', compact('data'));

        return $pdf->download('data_peserta_ujian_.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = PesertaUjian::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'id_user' => 'required',
            'periode_ujian' => 'required',
            'status_peserta' => 'required',
            'nomor_peserta_ujian' => 'required',
            'angkatan' => 'required',
        ], [
            'id_user.required' => 'ID User wajib diisi',
            'periode_ujian.required' => 'Periode Ujian wajib diisi',
            'status_peserta.required' => 'Status Peserta wajib diisi',
            'nomor_peserta_ujian.required' => 'Nomor Peserta Ujian wajib diisi',
            'status_peserta.required' => 'Angkatan wajib diisi',
        ]);
        $model->update([
            'id_user' => $request->id_user,
            'periode_ujian' => $request->periode_ujian,
            'status_peserta' => $request->status_peserta,
            'nomor_peserta_ujian' => $request->nomor_peserta_ujian,
            'angkatan' => $request->angkatan,
        ]);
        return redirect()->route('PesertaUjian.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = PesertaUjian::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('PesertaUjian.index')->with('success', 'Data Telah Terhapus');
    }
}
