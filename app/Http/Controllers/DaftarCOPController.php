<?php

namespace App\Http\Controllers;

use App\Exports\DaftarCOPExport;
use App\Models\DaftarCOP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;


class DaftarCOPController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = DaftarCOP::paginate(100);

        return view('data.data_pendaftar_cop', [
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
            'seafare_code' => 'required',
            'status' => 'required',
            'agama' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_sertifikat_cop' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan_desa' => 'required',
            'rt_rw' => 'required',
            'kode_pos' => 'required',
            'pekerjaan' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            'alamat' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'jenis_sertifikat_cop.required' => 'Jenis Sertifikat COP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'status.required' => 'Status Wajib Di Isi',
            'agama.required' => 'Agama Wajib Di Isi',
            'provinsi.required' => 'provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'rt_rw.required' => 'RT/RW Wajib Di Isi',
            'kode_pos.required' => 'Kode Pos Wajib Di Isi',
            'pekerjaan.required' => 'Pekerjaan Wajib Di Isi',
            'nama_ibu.required' => 'Nama Ibu Wajib Di Isi',
            'nama_ayah.required' => 'Nama Ayah Wajib Di Isi',
            'seafare_code.required' => 'Seafare Code Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Diupload',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'seafare_code' => $request->seafare_code,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'status' => $request->status,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_sertifikat_cop' => $request->jenis_sertifikat_cop,
            'pekerjaan' => $request->pekerjaan,
            'kode_pos' => $request->kode_pos,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'rt_rw' => $request->rt_rw,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'alamat' => $request->alamat,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);

        DaftarCOP::create($data);
        return redirect()->route('DaftarCOP.index')->with('success', 'Data Telah Tersimpan, Terimakasih Harap Menunggu Kami Akan Melakukan Pengecekan Terhadap Data Dan Akan Menghubungi Anda Di Nomor Telepon Yang Terkait Agar Dapat Melanjutkan Ke Sistem');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'seafare_code' => 'required',
            'status' => 'required',
            'agama' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_sertifikat_cop' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan_desa' => 'required',
            'rt_rw' => 'required',
            'kode_pos' => 'required',
            'pekerjaan' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            'alamat' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'jenis_sertifikat_cop.required' => 'Jenis Sertifikat COP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'status.required' => 'Status Wajib Di Isi',
            'agama.required' => 'Agama Wajib Di Isi',
            'provinsi.required' => 'provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'rt_rw.required' => 'RT/RW Wajib Di Isi',
            'kode_pos.required' => 'Kode Pos Wajib Di Isi',
            'pekerjaan.required' => 'Pekerjaan Wajib Di Isi',
            'nama_ibu.required' => 'Nama Ibu Wajib Di Isi',
            'nama_ayah.required' => 'Nama Ayah Wajib Di Isi',
            'seafare_code.required' => 'Seafare Code Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Diupload',
        ]);

        $data = [
            'nama_lengkap' => $request->nama_lengkap,
            'seafare_code' => $request->seafare_code,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'status' => $request->status,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_sertifikat_cop' => $request->jenis_sertifikat_cop,
            'pekerjaan' => $request->pekerjaan,
            'kode_pos' => $request->kode_pos,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'rt_rw' => $request->rt_rw,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'alamat' => $request->alamat,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data);

        DaftarCOP::create($data);
        return redirect()->route('Home')->with('success', 'Data Telah Tersimpan, Terimakasih Harap Menunggu Kami Akan Melakukan Pengecekan Terhadap Data Dan Akan Menghubungi Anda Di Nomor Telepon Yang Terkait Agar Dapat Melanjutkan Ke Sistem');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = DaftarCOP::findOrfail($id);
        return view('show_data.show_data_pendaftar_cop', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = DaftarCOP::findOrfail($id);
        return view('edit_data.edit_data_pendaftar_cop', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new DaftarCOPExport, 'report_all_pendaftar_diklat_cop.xlsx');
    }

    public function exportPDF($id)
    {
        $data = DaftarCOP::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_pendaftar_cop', compact('data'));

        return $pdf->download('report_all_pendaftar_cop.pdf');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = DaftarCOP::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = validator::make($request->all(), [
            'nama_lengkap' => 'required',
            'email' => 'required',
            'seafare_code' => 'required',
            'status' => 'required',
            'agama' => 'required',
            'no_telp' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_sertifikat_cop' => 'required',
            'jenis_kelamin' => 'required',
            'provinsi' => 'required',
            'kabupaten_kota' => 'required',
            'kecamatan' => 'required',
            'kelurahan_desa' => 'required',
            'rt_rw' => 'required',
            'kode_pos' => 'required',
            'pekerjaan' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
            'alamat' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
        ], [
            'nama_lengkap.required' => 'Nama Lengkap Wajib Di Isi',
            'jenis_sertifikat_cop.required' => 'Jenis Sertifikat COP Wajib Di Isi',
            'email.email' => 'Format Email Harus Benar',
            'email.required' => 'Email Wajib Di Isi',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Di Isi',
            'no_telp.required' => 'Nomor Telepon Wajib Di Isi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Di Isi',
            'status.required' => 'Status Wajib Di Isi',
            'agama.required' => 'Agama Wajib Di Isi',
            'provinsi.required' => 'provinsi Wajib Di Isi',
            'kabupaten_kota.required' => 'kabupaten_kota Wajib Di Isi',
            'kecamatan.required' => 'Kecamatan Wajib Di Isi',
            'kelurahan_desa.required' => 'Kelurahan/Desa Wajib Di Isi',
            'rt_rw.required' => 'RT/RW Wajib Di Isi',
            'kode_pos.required' => 'Kode Pos Wajib Di Isi',
            'pekerjaan.required' => 'Pekerjaan Wajib Di Isi',
            'nama_ibu.required' => 'Nama Ibu Wajib Di Isi',
            'nama_ayah.required' => 'Nama Ayah Wajib Di Isi',
            'seafare_code.required' => 'Seafare Code Wajib Di Isi',
            'foto.required' => 'Foto Wajib Diupload',
            'alamat.required' => 'Alamat Wajib Diupload',
        ]);

        $data = [];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto', $data, $model);

        // Update data
        $model->update([
            'nama_lengkap' => $request->nama_lengkap,
            'seafare_code' => $request->seafare_code,
            'no_telp' => $request->no_telp,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'email' => $request->email,
            'status' => $request->status,
            'agama' => $request->agama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'jenis_sertifikat_cop' => $request->jenis_sertifikat_cop,
            'pekerjaan' => $request->pekerjaan,
            'kode_pos' => $request->kode_pos,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'provinsi' => $request->provinsi,
            'kabupaten_kota' => $request->kabupaten_kota,
            'rt_rw' => $request->rt_rw,
            'kecamatan' => $request->kecamatan,
            'kelurahan_desa' => $request->kelurahan_desa,
            'alamat' => $request->alamat,
            'foto' => $data['foto'] ?? $model->foto,
        ]);

        return redirect()->route('DaftarCOP.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = DaftarCOP::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus semua file terkait
        $this->deleteRelatedFiles($data);

        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('DaftarCOP.index')->with('success', 'Data Telah Terhapus');
    }

    private function deleteRelatedFiles($data)
    {
        $fileFields = ['foto'];

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
