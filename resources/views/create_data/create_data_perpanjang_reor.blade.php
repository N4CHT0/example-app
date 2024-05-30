@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Perpanjangan Sertifikat REOR
                </p>
                <form action="{{ route('PerpanjangREOR.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_sertifikat">Jenis Sertifikat</label>
                        <select class="form-control" id="jenis_sertifikat" name="jenis_sertifikat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="SRE">SRE</option>
                            <option value="SOU">SOU</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_sertifikat">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" required>
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
                        <label for="kelurahan_desa">Kelurahan/Desa</label>
                        <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa" required>
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
                        <label for="scan_foto_npwp">Upload Scan/Foto NPWP</label>
                        <input type="file" class="form-control" id="scan_foto_npwp" name="scan_foto_npwp" required>
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_ijazah">Upload Scan/Foto Ijazah</label>
                        <input type="file" class="form-control" id="scan_foto_ijazah" name="scan_foto_ijazah"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_sertifikat">Upload Scan/Foto Sertifikat</label>
                        <input type="file" class="form-control" id="scan_foto_sertifikat" name="scan_foto_sertifikat"
                            required>
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
