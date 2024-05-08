<?php

namespace App\Http\Controllers;

use App\Exports\PerpanjangGMDSSExport;
use App\Models\PerpanjangGMDSS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PerpanjangGMDSSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerpanjangGMDSS::paginate(100);

        return view('data.data_perpanjang_gmdss', [
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
            'email' => 'required',
            'lembaga_diklat' => 'required',
            'status' => 'required',
            'seafare_code' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'pekerjaan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'kelurahan_desa' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_akte' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ktp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ijazah_laut' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_mcu' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_sertifikat_bst' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_masa_layar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'alamat' => 'required',
            'nama_ibu_kandung' => 'required',
            'nama_ayah_kandung' => 'required',
            'kewarganegaraan' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'nik.required' => 'NIK Wajib Di Isi',
            'npwp.required' => 'NPWP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'status.required' => 'Status Wajib Di Isi',
            'seafare_code.required' => 'Seafare Code Wajib Di Isi',
            'provinsi.required' => 'provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kode_pos.required' => 'Kode Pos Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'pekerjaan.required' => 'Pekerjaan Wajib Di Isi',
            'nama_ibu_kandung.required' => 'Nama Ibu Kandung Wajib Di Isi',
            'nama_ayah_kandung.required' => 'Nama Ayah Kandung Wajib Di Isi',
            'lembaga_diklat.required' => 'Diklat Asal Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'scan_foto_ktp.required' => 'Scan/Foto KTP Wajib Diupload',
            'scan_foto_masa_layar.required' => 'Scan/Foto Masa Layar Wajib Diupload',
            'scan_foto_sertifikat_bst.required' => 'Scan/Foto Sertifikat BST Wajib Diupload',
            'scan_foto_ijazah_laut.required' => 'Scan/Foto Ijazah Laut Wajib Diupload',
            'scan_foto_akte.required' => 'Scan/Foto Akte Wajib Diupload',
            'scan_foto_mcu.required' => 'Scan/Foto MCU Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Di Isi',
            'kewarganegaraan.required' => 'Kewarganegaraan Wajib Di Isi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Di Isi',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'lembaga_diklat' => $request->lembaga_diklat,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'status' => $request->status,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'seafare_code' => $request->seafare_code,
            'pekerjaan' => $request->pekerjaan,
            'nama_ibu_kandung' => $request->nama_ibu_kandung,
            'nama_ayah_kandung' => $request->nama_ayah_kandung,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);
        $this->processImageUpload($request, 'scan_foto_ktp', $data);
        $this->processImageUpload($request, 'scan_foto_akte', $data);
        $this->processImageUpload($request, 'scan_foto_ijazah_laut', $data);
        $this->processImageUpload($request, 'scan_foto_mcu', $data);
        $this->processImageUpload($request, 'scan_foto_masa_layar', $data);
        $this->processImageUpload($request, 'scan_foto_sertifikat_bst', $data);

        PerpanjangGMDSS::create($data);
        return redirect()->route('PerpanjangGMDSS.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'lembaga_diklat' => 'required',
            'status' => 'required',
            'seafare_code' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'pekerjaan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'kelurahan_desa' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_akte' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ktp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ijazah_laut' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_mcu' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_sertifikat_bst' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_masa_layar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'alamat' => 'required',
            'nama_ibu_kandung' => 'required',
            'nama_ayah_kandung' => 'required',
            'kewarganegaraan' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'nik.required' => 'NIK Wajib Di Isi',
            'npwp.required' => 'NPWP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'status.required' => 'Status Wajib Di Isi',
            'seafare_code.required' => 'Seafare Code Wajib Di Isi',
            'provinsi.required' => 'provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kode_pos.required' => 'Kode Pos Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'pekerjaan.required' => 'Pekerjaan Wajib Di Isi',
            'nama_ibu_kandung.required' => 'Nama Ibu Kandung Wajib Di Isi',
            'nama_ayah_kandung.required' => 'Nama Ayah Kandung Wajib Di Isi',
            'lembaga_diklat.required' => 'Diklat Asal Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'scan_foto_ktp.required' => 'Scan/Foto KTP Wajib Diupload',
            'scan_foto_masa_layar.required' => 'Scan/Foto Masa Layar Wajib Diupload',
            'scan_foto_sertifikat_bst.required' => 'Scan/Foto Sertifikat BST Wajib Diupload',
            'scan_foto_ijazah_laut.required' => 'Scan/Foto Ijazah Laut Wajib Diupload',
            'scan_foto_akte.required' => 'Scan/Foto Akte Wajib Diupload',
            'scan_foto_mcu.required' => 'Scan/Foto MCU Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Di Isi',
            'kewarganegaraan.required' => 'Kewarganegaraan Wajib Di Isi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Di Isi',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'lembaga_diklat' => $request->lembaga_diklat,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'status' => $request->status,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'seafare_code' => $request->seafare_code,
            'pekerjaan' => $request->pekerjaan,
            'nama_ibu_kandung' => $request->nama_ibu_kandung,
            'nama_ayah_kandung' => $request->nama_ayah_kandung,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);
        $this->processImageUpload($request, 'scan_foto_ktp', $data);
        $this->processImageUpload($request, 'scan_foto_akte', $data);
        $this->processImageUpload($request, 'scan_foto_ijazah_laut', $data);
        $this->processImageUpload($request, 'scan_foto_mcu', $data);
        $this->processImageUpload($request, 'scan_foto_masa_layar', $data);
        $this->processImageUpload($request, 'scan_foto_sertifikat_bst', $data);

        PerpanjangGMDSS::create($data);
        return redirect()->route('Home')->with('success', 'Data Telah Tersimpan, Terimakasih Harap Menunggu Kami Akan Melakukan Pengecekan Terhadap Data Dan Akan Menghubungi Anda Di Nomor Telepon Yang Terkait Agar Dapat Melanjutkan Ke Sistem');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PerpanjangGMDSS::findOrfail($id);
        return view('show_data.show_data_perpanjang_gmdss', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PerpanjangGMDSS::findOrfail($id);
        return view('edit_data.edit_data_perpanjang_gmdss', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new PerpanjangGMDSSExport(), 'report_all_perpanjangan_sertifikat_gmdss.xlsx');
    }

    public function exportPDF($id)
    {
        $data = PerpanjangGMDSS::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_perpanjang_gmdss', compact('data'));

        return $pdf->download('report_all_data_perpanjangan_sertifikat_gmdss.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $model = PerpanjangGMDSS::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }

        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'lembaga_diklat' => 'required',
            'status' => 'required',
            'seafare_code' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'pekerjaan' => 'required',
            'kecamatan' => 'required',
            'kode_pos' => 'required',
            'kelurahan_desa' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_akte' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ktp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ijazah_laut' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_mcu' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_sertifikat_bst' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_masa_layar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'alamat' => 'required',
            'nama_ibu_kandung' => 'required',
            'nama_ayah_kandung' => 'required',
            'kewarganegaraan' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'nik.required' => 'NIK Wajib Di Isi',
            'npwp.required' => 'NPWP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'status.required' => 'Status Wajib Di Isi',
            'seafare_code.required' => 'Seafare Code Wajib Di Isi',
            'provinsi.required' => 'provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kode_pos.required' => 'Kode Pos Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'pekerjaan.required' => 'Pekerjaan Wajib Di Isi',
            'nama_ibu_kandung.required' => 'Nama Ibu Kandung Wajib Di Isi',
            'nama_ayah_kandung.required' => 'Nama Ayah Kandung Wajib Di Isi',
            'lembaga_diklat.required' => 'Diklat Asal Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'scan_foto_ktp.required' => 'Scan/Foto KTP Wajib Diupload',
            'scan_foto_masa_layar.required' => 'Scan/Foto Masa Layar Wajib Diupload',
            'scan_foto_sertifikat_bst.required' => 'Scan/Foto Sertifikat BST Wajib Diupload',
            'scan_foto_ijazah_laut.required' => 'Scan/Foto Ijazah Laut Wajib Diupload',
            'scan_foto_akte.required' => 'Scan/Foto Akte Wajib Diupload',
            'scan_foto_mcu.required' => 'Scan/Foto MCU Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Di Isi',
            'kewarganegaraan.required' => 'Kewarganegaraan Wajib Di Isi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Di Isi',
        ]);

        $data = [];
        $this->processImageUpload($request, 'foto', $data, $model);
        $this->processImageUpload($request, 'scan_foto_ktp', $data, $model);
        $this->processImageUpload($request, 'scan_foto_akte', $data, $model);
        $this->processImageUpload($request, 'scan_foto_ijazah_laut', $data, $model);
        $this->processImageUpload($request, 'scan_foto_mcu', $data, $model);
        $this->processImageUpload($request, 'scan_foto_masa_layar', $data, $model);
        $this->processImageUpload($request, 'scan_foto_sertifikat_bst', $data, $model);


        // Update data
        $model->update([
            'nama_lengkap' => $request->nama_lengkap,
            'lembaga_diklat' => $request->lembaga_diklat,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'status' => $request->status,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'seafare_code' => $request->seafare_code,
            'pekerjaan' => $request->pekerjaan,
            'nama_ibu_kandung' => $request->nama_ibu_kandung,
            'nama_ayah_kandung' => $request->nama_ayah_kandung,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'kode_pos' => $request->kode_pos,
            'alamat' => $request->alamat,
            'kewarganegaraan' => $request->kewarganegaraan,
            'foto' => $data['foto'] ?? $model->foto, // Pastikan atribut sesuai dengan kolom di tabel
            'scan_foto_ktp' => $data['scan_foto_ktp'] ?? $model->scan_foto_ktp,
            'scan_foto_akte' => $data['scan_foto_akte'] ?? $model->scan_foto_akte,
            'scan_foto_ijazah_laut' => $data['scan_foto_ijazah_laut'] ?? $model->scan_foto_ijazah_laut,
            'scan_foto_mcu' => $data['scan_foto_mcu'] ?? $model->scan_foto_mcu,
            'scan_foto_masa_layar' => $data['scan_foto_masa_layar'] ?? $model->scan_foto_masa_layar,
            'scan_foto_sertifikat_bst' => $data['scan_foto_sertifikat_bst'] ?? $model->scan_foto_sertifikat_bst,
        ]);

        return redirect()->route('PerpanjangGMDSS.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = PerpanjangGMDSS::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus semua file terkait
        $this->deleteRelatedFiles($data);

        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('PerpanjangGMDSS.index')->with('success', 'Data Telah Terhapus');
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

    private function deleteRelatedFiles($data)
    {
        $fileFields = ['foto', 'scan_foto_ktp', 'scan_foto_akte', 'scan_foto_ijazah_laut', 'scan_foto_sertifikat_bst', 'scan_foto_mcu', 'scan_foto_masa_layar'];

        foreach ($fileFields as $fieldName) {
            if ($data->$fieldName) {
                Storage::delete('public/img/' . basename($data->$fieldName));
            }
        }
    }
}
