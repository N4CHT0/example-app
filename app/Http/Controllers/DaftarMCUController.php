<?php

namespace App\Http\Controllers;

use App\Exports\DaftarMCUExport;
use App\Models\DaftarMCU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class DaftarMCUController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DaftarMCU::paginate(100);

        return view('data.data_pendaftar_mcu', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jabatan_diatas_kapal' => 'required',
            'no_telp' => 'required',
            'edit_foto' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'foto_ktp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'foto_bst' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'jabatan_diatas_kapal.required' => 'Jabatan Diatas Kapal Wajib Di Isi',
            'no_telp.required' => 'No Telepon Wsjib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'foto_ktp.required' => 'Foto KTP Wajib Diupload',
            'foto_bst.required' => 'Foto BST Wajib Diupload',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan_diatas_kapal' => $request->jabatan_diatas_kapal,
            'no_telp' => $request->no_telp,
            'edit_foto' => $request->edit_foto,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);
        $this->processImageUpload($request, 'foto_ktp', $data);
        $this->processImageUpload($request, 'foto_bst', $data);


        DaftarMCU::create($data);
        return redirect()->route('DaftarMCU.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jabatan_diatas_kapal' => 'required',
            'no_telp' => 'required',
            'edit_foto' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'foto_ktp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'foto_bst' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'jabatan_diatas_kapal.required' => 'Jabatan Diatas Kapal Wajib Di Isi',
            'no_telp.required' => 'No Telepon Wajib Di Isi',
            'edit_foto.required' => 'Edit Foto Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'foto_ktp.required' => 'Foto Wajib Diupload',
            'foto_bst.required' => 'Foto Wajib Diupload',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan_diatas_kapal' => $request->jabatan_diatas_kapal,
            'no_telp' => $request->no_telp,
            'edit_foto' => $request->edit_foto,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);
        $this->processImageUpload($request, 'foto_ktp', $data);
        $this->processImageUpload($request, 'foto_bst', $data);

        DaftarMCU::create($data);
        return redirect()->route('Home')->with('success', 'Data Telah Tersimpan, Terimakasih Harap Menunggu Kami Akan Melakukan Pengecekan Terhadap Data Dan Akan Menghubungi Anda Di Nomor Telepon Yang Terkait Agar Dapat Melanjutkan Ke Sistem');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DaftarMCU::findOrfail($id);
        return view('show_data.show_data_pendaftar_mcu', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DaftarMCU::findOrfail($id);
        return view('edit_data.edit_data_pendaftar_mcu', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new DaftarMCUExport, 'report_all_pendaftar_diklat_mcu.xlsx');
    }

    public function exportPDF($id)
    {
        $data = DaftarMCU::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_pendaftar_mcu', compact('data'));

        return $pdf->download('report_all_pendaftar_mcu.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = DaftarMCU::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'jabatan_diatas_kapal' => 'required',
            'no_telp' => 'required',
            'edit_foto' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            'foto_ktp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            'foto_bst' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'jabatan_diatas_kapal.required' => 'Jabatan Diatas Kapal Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'edit_foto.required' => 'Edit Foto Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'foto_ktp.required' => 'Foto Wajib Diupload',
            'foto_bst.required' => 'Foto Wajib Diupload',
        ]);

        $data = [];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data, $model);
        $this->processImageUpload($request, 'foto_ktp', $data, $model);
        $this->processImageUpload($request, 'foto_bst', $data, $model);

        // Update data
        $model->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jabatan_diatas_kapal' => $request->jabatan_diatas_kapal,
            'no_telp' => $request->no_telp,
            'edit_foto' => $request->edit_foto,
            'foto' => $data['foto'] ?? $model->foto,
            'foto_ktp' => $data['foto_ktp'] ?? $model->foto_ktp,
            'foto_bst' => $data['foto_bst'] ?? $model->foto_bst,
        ]);

        return redirect()->route('DaftarMCU.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = DaftarMCU::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus semua file terkait
        $this->deleteRelatedFiles($data);

        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('DaftarMCU.index')->with('success', 'Data Telah Terhapus');
    }

    private function deleteRelatedFiles($data)
    {
        $fileFields = ['foto', 'foto_ktp', 'foto_bst'];

        foreach ($fileFields as $fieldName) {
            if ($data->$fieldName) {
                Storage::delete('public/img/' . basename($data->$fieldName));
            }
        }
    }

    private function processImageUpload($request, $fieldName, &$data, $model = null)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/img', $imageName);

            // Hapus file lama jika sedang melakukan update
            if ($model && $model->$fieldName) {
                Storage::delete('public/img/' . $model->$fieldName);
            }

            // Tambahkan nama file ke data
            $data[$fieldName] = $imageName;
        } elseif ($model && $model->$fieldName) {
            // Jika tidak ada file baru diupload, tetapi ada file lama, gunakan file lama
            $data[$fieldName] = $model->$fieldName;
        }
    }
}
