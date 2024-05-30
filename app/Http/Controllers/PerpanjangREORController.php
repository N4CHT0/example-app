<?php

namespace App\Http\Controllers;

use App\Exports\PerpanjangREORExport;
use App\Models\PerpanjangREOR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class PerpanjangREORController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PerpanjangREOR::paginate(100);

        return view('data.data_perpanjang_reor', [
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
            'jenis_sertifikat' => 'required',
            'no_sertifikat' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'npwp' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan_desa' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_npwp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_sertifikat' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ijazah' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'alamat' => 'required',
            'agama' => 'required',
            'edit_foto' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'nik.required' => 'NIK Wajib Di Isi',
            'npwp.required' => 'NPWP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'no_sertifikat.required' => 'Nomor Sertifikat Wajib Di Isi',
            'provinsi.required' => 'Provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'jenis_sertifikat.required' => 'Jenis Sertifikat Wajib Di Isi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'scan_foto_npwp.required' => 'Scan/Foto NPWP Wajib Diupload',
            'scan_foto_ijazah.required' => 'Scan/Foto Ijazah Wajib Diupload',
            'scan_foto_sertifikat.required' => 'Scan/Foto Sertifikat Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Di Isi',
            'agama.required' => 'Agama Wajib Di Isi',
            'edit_foto.required' => 'Edit Foto Wajib Di Isi',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_sertifikat' => $request->jenis_sertifikat,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'no_sertifikat' => $request->no_sertifikat,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'alamat' => $request->alamat,
            'edit_foto' => $request->edit_foto,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);
        $this->processImageUpload($request, 'scan_foto_sertifikat', $data);
        $this->processImageUpload($request, 'scan_foto_npwp', $data);
        $this->processImageUpload($request, 'scan_foto_ijazah', $data);

        PerpanjangREOR::create($data);
        return redirect()->route('PerpanjangREOR.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'jenis_sertifikat' => 'required',
            'no_sertifikat' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'npwp' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan_desa' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_npwp' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_sertifikat' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'scan_foto_ijazah' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'alamat' => 'required',
            'agama' => 'required',
            'edit_foto' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'nik.required' => 'NIK Wajib Di Isi',
            'npwp.required' => 'NPWP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'no_sertifikat.required' => 'Nomor Sertifikat Wajib Di Isi',
            'provinsi.required' => 'Provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'jenis_sertifikat.required' => 'Jenis Sertifikat Wajib Di Isi',
            'jenis_kelamin.required' => 'Jenis Kelamin Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'scan_foto_npwp.required' => 'Scan/Foto NPWP Wajib Diupload',
            'scan_foto_ijazah.required' => 'Scan/Foto Ijazah Wajib Diupload',
            'scan_foto_sertifikat.required' => 'Scan/Foto Sertifikat Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Di Isi',
            'agama.required' => 'Agama Wajib Di Isi',
            'edit_foto.required' => 'Edit Foto Wajib Di Isi',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_sertifikat' => $request->jenis_sertifikat,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'no_sertifikat' => $request->no_sertifikat,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'alamat' => $request->alamat,
            'edit_foto' => $request->edit_foto,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);
        $this->processImageUpload($request, 'scan_foto_sertifikat', $data);
        $this->processImageUpload($request, 'scan_foto_npwp', $data);
        $this->processImageUpload($request, 'scan_foto_ijazah', $data);

        PerpanjangREOR::create($data);
        return redirect()->route('Home')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PerpanjangREOR::findOrfail($id);
        return view('show_data.show_data_perpanjang_reor', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = PerpanjangREOR::findOrfail($id);
        return view('edit_data.edit_data_perpanjang_reor', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new PerpanjangREORExport(), 'report_all_data_perpanjangan_sertifikat_reor.xlsx');
    }

    public function exportPDF($id)
    {
        $data = PerpanjangREOR::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_perpanjang_reor', compact('data'));

        return $pdf->download('report_all_data_perpanjangan_sertifikat_reor.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $model = PerpanjangREOR::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }

        $validasi = Validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'jenis_sertifikat' => 'required',
            'no_sertifikat' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'npwp' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan_desa' => 'required',
            'foto' => $request->hasFile('foto') ? 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080' : '',
            'scan_foto_npwp' => $request->hasFile('scan_foto_npwp') ? 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080' : '',
            'scan_foto_ijazah' => $request->hasFile('scan_foto_ijazah') ? 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080' : '',
            'scan_foto_sertifikat' => $request->hasFile('scan_foto_sertifikat') ? 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080' : '',
            'alamat' => 'required',
            'edit_foto' => 'required',
            'agama' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'nik.required' => 'NIK Wajib Di Isi',
            'npwp.required' => 'NPWP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'no_sertifikat.required' => 'Nomor Sertifikat Wajib Di Isi',
            'provinsi.required' => 'provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'jenis_sertifikat.required' => 'Jenis Sertifikat Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'scan_foto_npwp.required' => 'Scan/Foto NPWP Wajib Diupload',
            'scan_foto_sertifikat.required' => 'Scan/Foto Sertifikat Wajib Diupload',
            'scan_foto_ijazah.required' => 'Scan/Foto Ijazah Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Di Isi',
            'edit_foto.required' => 'Edit Foto Wajib Di Isi',
            'agama.required' => 'Agama Wajib Di Isi',
        ]);

        // Inisialisasi $data
        $data = [];
        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data, $model);
        $this->processImageUpload($request, 'scan_foto_npwp', $data, $model);
        $this->processImageUpload($request, 'scan_foto_ijazah_laut', $data, $model);
        $this->processImageUpload($request, 'scan_foto_sertifikat', $data, $model);


        // Update data
        $model->update([
            'nama_lengkap' => $request->nama_lengkap,
            'jenis_sertifikat' => $request->jenis_sertifikat,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'no_sertifikat' => $request->no_sertifikat,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'alamat' => $request->alamat,
            'edit_foto' => $request->edit_foto,
            'foto' => $data['foto'] ?? $model->foto,
            'scan_foto_ijazah' => $data['scan_foto_ijazah'] ?? $model->scan_foto_ijazah,
            'scan_foto_npwp' => $data['scan_foto_npwp'] ?? $model->scan_foto_npwp,
            'scan_foto_sertifikat' => $data['scan_foto_sertifikat'] ?? $model->scan_foto_sertifikat,
        ]);
        return redirect()->route('PerpanjangREOR.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = PerpanjangREOR::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus semua file terkait
        $this->deleteRelatedFiles($data);

        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('PerpanjangGMDSS.index')->with('success', 'Data Telah Terhapus');
    }

    private function deleteRelatedFiles($data)
    {
        $fileFields = ['foto', 'scan_foto_npwp', 'scan_foto_ijazah', 'scan_foto_sertifikat'];

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
