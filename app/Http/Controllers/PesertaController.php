<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use App\Models\AbsensiSiswa;
use App\Models\Keuangan;
use App\Models\MataPelajaran;
use App\Models\NilaiUjianLokal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PesertaController extends Controller
{
    public function Absensi(Request $request)
    {
        $user = auth()->user(); // Mendapatkan user yang sedang login

        // Query untuk mendapatkan data absensi yang sesuai dengan user yang sedang login
        $query = AbsensiSiswa::whereHas('pesertaUjian', function ($q) use ($user) {
            $q->where('id_user', $user->id); // Menghubungkan dengan user yang sedang login
        });

        // Menerapkan filter jika ada
        if ($request->filled('mata_pelajaran')) {
            $query->where('id_mata_pelajaran', $request->mata_pelajaran);
        }

        if ($request->filled('pertemuan')) {
            $query->where('pertemuan', $request->pertemuan);
        }

        $data = $query->get();

        // Data untuk dropdown filter
        $mataPelajaranList = MataPelajaran::pluck('nama_mata_pelajaran', 'id');
        $pertemuanList = AbsensiSiswa::pluck('pertemuan', 'pertemuan')->unique();
        $statusList = AbsensiSiswa::pluck('status', 'status')->unique();

        return view('show_data.show_data_peserta_absensi', compact('data', 'mataPelajaranList', 'pertemuanList', 'statusList'));
    }

    public function Keuangan(Request $request)
    {
        $user = auth()->user(); // Mendapatkan user yang sedang login
        $query = Keuangan::whereHas('User', function ($q) use ($user) {
            $q->where('id_user', $user->id); // Menghubungkan dengan user yang sedang login
        });

        if ($request->filled('data_pembayaran')) {
            $query->where('data_pembayaran', $request->data_pembayaran);
        }

        $data = $query->get();

        // Data untuk dropdown filter
        $keuanganList = Keuangan::pluck('data_pembayaran', 'data_pembayaran')->unique();
        return view('data.data_histori_keuangan', compact('data', 'keuanganList'));
    }

    public function Nilai(Request $request)
    {
        $user = auth()->user();

        // Query untuk mendapatkan data nilai ujian lokal yang sesuai dengan user yang sedang login
        $query = NilaiUjianLokal::whereHas('pesertaUjian', function ($q) use ($user) {
            $q->where('id_user', $user->id);
        });

        $data = $query->get();

        return view('show_data.show_data_peserta_nilai', compact('data'));
    }

    public function edit(Request $request): View
    {
        return view('edit_data.edit_data_siswa', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();
        $data = $request->validated();

        // Proses upload gambar (foto) menggunakan fungsi processImageUpload
        $this->processImageUpload($request, 'foto', $data, $user);

        $user->fill($data);

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Redirect berdasarkan nilai dari jenis_akun
        if ($user->jenis_akun === 'pendaftar') {
            return redirect()->route('Dashboard.Pendaftar')->with('status', 'profile-updated');
        } elseif ($user->jenis_akun === 'siswa') {
            return redirect()->route('Dashboard.Siswa')->with('status', 'profile-updated');
        } elseif ($user->jenis_akun === 'admin') {
            return redirect()->route('Dashboard.Pegawai')->with('status', 'profile-updated');
        } elseif ($user->jenis_akun === 'pengajar') {
            return redirect()->route('Dashboard.Pengajar')->with('status', 'profile-updated');
        }
    }

    /**
     * Process image upload.
     */
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
