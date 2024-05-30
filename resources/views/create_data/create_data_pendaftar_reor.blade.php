@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Pendaftaran Diklat REOR
                </p>

                <form action="{{ route('DaftarREOR.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="pilihan_diklat">Pilihan Diklat</label>
                        <select class="form-control" id="pilihan_diklat" name="pilihan_diklat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="SRE-I">SRE-I</option>
                            <option value="SRE-II">SRE-II</option>
                            <option value="SOU-REGULAR">SOU-REGULAR</option>
                            <option value="SOU-NAUTIKA">SOU-NAUTIKA</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="periode_ujian_negara">Periode Ujian Negara</label>
                        <select class="form-control" id="periode_ujian_negara" name="periode_ujian_negara" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Januari">Januari</option>
                            <option value="Februari">Februari</option>
                            <option value="Maret">Maret</option>
                            <option value="April">April</option>
                            <option value="Mei">Mei</option>
                            <option value="Juni">Juni</option>
                            <option value="Juli">Juli</option>
                            <option value="Agustus">Agustus</option>
                            <option value="September">September</option>
                            <option value="Oktober">Oktober</option>
                            <option value="November">November</option>
                            <option value="Desember">Desember</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" required>
                    </div>

                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="nama_instansi">Nama Instansi</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            autocomplete="street-address" required>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama" required>
                    </div>

                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    </div>

                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
                    </div>

                    <div class="form-group">
                        <label for="kabupaten_kota">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                    </div>

                    <div class="form-group">
                        <label for="penghasilan_ibu">Penghasilan Ibu</label>
                        <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah" required>
                    </div>

                    <div class="form-group">
                        <label for="penghasilan_ayah">Penghasilan Ayah</label>
                        <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="edit_foto">Edit Foto</label><br>
                        <input type="radio" id="edit_foto" name="edit_foto" value="YA" required>
                        <label for="edit_foto">Ya</label>
                        <input type="radio" id="edit_foto_tidak" name="edit_foto" value="TIDAK" required>
                        <label for="edit_foto_tidak">Tidak</label>
                    </div>

                    <div class="form-group">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" required>
                    </div>

                    <div class="form-group">
                        <h6 style="font-weight: bold" for="">Note : Ketentuan Foto</h6 style="font-weight: bold">
                        <h6 style="font-weight: bold" for="">1. Jas Hitam, Kemeja Putih, Dasi Hitam</h6
                            style="font-weight: bold">
                        <h6 style="font-weight: bold" for="">2. Apabila Tidak Punya, Melakukan Foto Selfie
                            Biasa, Terdapat Edit
                            Foto
                            Dengan Biaya
                            Tambahan Rp.50.000</h6 style="font-weight: bold">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_ktp">Upload Scan/Foto KTP</label>
                        <input type="file" class="form-control" id="scan_foto_ktp" name="scan_foto_ktp" required>
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_ijazah_terakhir">Upload Scan/Foto Ijazah Terakhir</label>
                        <input type="file" class="form-control" id="scan_foto_ijazah_terakhir"
                            name="scan_foto_ijazah_terakhir" required>
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_akte">Upload Scan/Foto Akte Kelahiran</label>
                        <input type="file" class="form-control" id="scan_foto_akte" name="scan_foto_akte" required>
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_npwp">Upload Scan/Foto NPWP</label>
                        <input type="file" class="form-control" id="scan_foto_npwp" name="scan_foto_npwp" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Laki - Laki">Laki - Laki</option>
                            <option value="Perempuan">Perempuan</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
