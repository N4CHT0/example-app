<?php

namespace App\Http\Controllers;

use App\Exports\AbsensiSiswaExport;
use App\Models\AbsensiSiswa;
use App\Models\MataPelajaran;
use App\Models\PesertaUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class AbsensiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = AbsensiSiswa::with('pesertaUjian.Users', 'MataPelajaran');

        // Apply filters if they are present in the request
        if ($request->filled('nama_lengkap')) {
            $query->whereHas('pesertaUjian.Users', function ($q) use ($request) {
                $q->where('nama_lengkap', $request->nama_lengkap);
            });
        }

        if ($request->filled('jenis_diklat')) {
            $query->whereHas('pesertaUjian.Users', function ($q) use ($request) {
                $q->where('jenis_diklat', $request->jenis_diklat);
            });
        }

        if ($request->filled('pertemuan')) {
            $query->where('pertemuan', $request->pertemuan);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('mata_pelajaran')) {
            $query->whereHas('MataPelajaran', function ($q) use ($request) {
                $q->where('nama_mata_pelajaran', $request->mata_pelajaran);
            });
        }

        $data = $query->get();

        // Get distinct values for filters
        $namaLengkapList = AbsensiSiswa::with('pesertaUjian.Users')->get()->pluck('pesertaUjian.Users.nama_lengkap')->unique();
        $jenisDiklatList = AbsensiSiswa::with('pesertaUjian.Users')->get()->pluck('pesertaUjian.Users.jenis_diklat')->unique();
        $pertemuanList = AbsensiSiswa::pluck('pertemuan')->unique();
        $statusList = AbsensiSiswa::pluck('status')->unique();
        $mataPelajaranList = AbsensiSiswa::with('MataPelajaran')->get()->pluck('MataPelajaran.nama_mata_pelajaran')->unique();

        return view('data.data_absensi', [
            'data' => $data,
            'namaLengkapList' => $namaLengkapList,
            'jenisDiklatList' => $jenisDiklatList,
            'pertemuanList' => $pertemuanList,
            'statusList' => $statusList,
            'mataPelajaranList' => $mataPelajaranList
        ]);
    }

    public function exportAllExcel(Request $request)
    {
        $query = AbsensiSiswa::with('pesertaUjian.Users', 'MataPelajaran');

        // Apply filters if they are present in the request
        if ($request->filled('nama_lengkap')) {
            $query->whereHas('pesertaUjian.Users', function ($q) use ($request) {
                $q->where('nama_lengkap', $request->nama_lengkap);
            });
        }

        if ($request->filled('jenis_diklat')) {
            $query->whereHas('pesertaUjian.Users', function ($q) use ($request) {
                $q->where('jenis_diklat', $request->jenis_diklat);
            });
        }

        if ($request->filled('pertemuan')) {
            $query->where('pertemuan', $request->pertemuan);
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('mata_pelajaran')) {
            $query->whereHas('MataPelajaran', function ($q) use ($request) {
                $q->where('nama_mata_pelajaran', $request->mata_pelajaran);
            });
        }

        $data = $query->get()->map(function ($item, $key) {
            return [
                'No' => $key + 1,
                'Nama Peserta Ujian' => $item->pesertaUjian->Users->nama_lengkap,
                'Jenis Diklat' => $item->pesertaUjian->Users->jenis_diklat,
                'Mata Pelajaran' => $item->MataPelajaran->nama_mata_pelajaran,
                'Status' => $item->status,
                'Pertemuan' => $item->pertemuan,
            ];
        });

        return Excel::download(new AbsensiSiswaExport($data), 'absensi.xlsx');
    }

    public function getNama(Request $request)
    {
        $status = ['Akan Mengikuti Ujian'];
        $users = PesertaUjian::with('Users')
            ->whereIn('status_peserta', $status);

        if ($search = $request->name) {
            $users->whereHas('Users', function ($query) use ($search) {
                $query->where('nama_lengkap', 'LIKE', "%$search%");
            });
        }

        $nama_lengkap = $users->get()->map(function ($peserta) {
            return [
                'id' => $peserta->id,
                'nama_lengkap' => $peserta->Users->nama_lengkap,
            ];
        });

        return response()->json($nama_lengkap);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $mata_pelajaran = MataPelajaran::all();
        return view('create_data.create_data_absensi', compact('mata_pelajaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_mata_pelajaran' => 'required',
            'id_peserta_ujian' => 'required',
            'status' => 'required',
            'pertemuan' => 'required',
        ], [
            'id_mata_pelajaran.required' => 'Mata Pelajaran wajib diisi',
            'id_peserta_ujian.required' => 'Peserta Ujian wajib diisi',
            'status.required' => 'Nomor Peserta Ujian wajib diisi',
            'pertemuan.required' => 'Angkatan wajib diisi',
        ]);
        $data = [
            'id_peserta_ujian' => $request->id_peserta_ujian,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'status' => $request->status,
            'pertemuan' => $request->pertemuan,
        ];
        AbsensiSiswa::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Absensi.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mata_pelajaran = MataPelajaran::all();
        $data = AbsensiSiswa::findOrfail($id);
        return view('show_data.show_data_absensi_siswa', compact('data', 'mata_pelajaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mata_pelajaran = MataPelajaran::all();
        $data = AbsensiSiswa::findOrfail($id);
        return view('edit_data.edit_data_absensi', compact('data', 'mata_pelajaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function exportPDF($id)
    {
        $data = AbsensiSiswa::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_absensi_siswa', compact('data'));

        return $pdf->download('data_absensi_siswa_.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = AbsensiSiswa::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'id_mata_pelajaran' => 'required',
            'id_peserta_ujian' => 'required',
            'status' => 'required',
            'pertemuan' => 'required',
        ], [
            'id_mata_pelajaran.required' => 'Mata Pelajaran wajib diisi',
            'id_peserta_ujian.required' => 'Peserta Ujian wajib diisi',
            'status.required' => 'Nomor Peserta Ujian wajib diisi',
            'pertemuan.required' => 'Angkatan wajib diisi',
        ]);
        $model->update([
            'id_peserta_ujian' => $request->id_peserta_ujian,
            'id_mata_pelajaran' => $request->id_mata_pelajaran,
            'status' => $request->status,
            'pertemuan' => $request->pertemuan,
        ]);
        return redirect()->route('Absensi.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = AbsensiSiswa::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('Absensi.index')->with('success', 'Data Telah Terhapus');
    }
}
