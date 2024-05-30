@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Perpanjangan Sertifikat REOR
                </p>
                <form action="{{ route('PerpanjangREOR.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="jenis_sertifikat">Jenis Sertifikat</label>
                        <select class="form-control" id="jenis_sertifikat" name="jenis_sertifikat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="SRE" {{ $data->jenis_sertifikat == 'SRE' ? 'selected' : '' }}>SRE</option>
                            <option value="SOU" {{ $data->jenis_sertifikat == 'SOU' ? 'selected' : '' }}>SOU</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="no_sertifikat">Nomor Sertifikat</label>
                        <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat"
                            value="{{ $data->no_sertifikat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->nik }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp" value="{{ $data->npwp }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ $data->nama_lengkap }}" autocomplete="name" required>
                    </div>

                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                            value="{{ $data->tempat_lahir }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $data->tanggal_lahir }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                            value="{{ $data->no_telp }}"required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            autocomplete="street-address" value="{{ $data->alamat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="agama">Agama</label>
                        <input type="text" class="form-control" id="agama" name="agama"
                            value="{{ $data->agama }}" required>
                    </div>

                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi"
                            value="{{ $data->provinsi }}"required>
                    </div>

                    <div class="form-group">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                            value="{{ $data->kecamatan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kabupaten_kota">Kabupaten/Kota</label>
                        <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota"
                            value="{{ $data->kabupaten_kota }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kelurahan_desa">Kelurahan/Desa</label>
                        <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa"
                            value="{{ $data->kelurahan_desa }}" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_foto">Edit Foto</label><br>
                        <input type="radio" id="edit_foto_ya" name="edit_foto" value="YA"
                            {{ $data->edit_foto == 'YA' ? 'checked' : '' }} required>
                        <label for="edit_foto_ya">Ya</label>
                        <input type="radio" id="edit_foto_tidak" name="edit_foto" value="TIDAK"
                            {{ $data->edit_foto == 'TIDAK' ? 'checked' : '' }} required>
                        <label for="edit_foto_tidak">Tidak</label>
                    </div>

                    <div class="form-group">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto"
                            value="{{ $data->foto }}">
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
                        <input type="file" class="form-control" id="scan_foto_npwp" name="scan_foto_npwp"
                            value="{{ $data->scan_foto_npwp }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_ijazah">Upload Scan/Foto Ijazah</label>
                        <input type="file" class="form-control" id="scan_foto_ijazah" name="scan_foto_ijazah"
                            value="{{ $data->scan_foto_ijazah }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_sertifikat">Upload Scan/Foto Sertifikat</label>
                        <input type="file" class="form-control" id="scan_foto_sertifikat" name="scan_foto_sertifikat"
                            value="{{ $data->scan_foto_sertifikat }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                            value="{{ $data->email }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Laki - Laki" {{ $data->jenis_kelamin == 'Laki - Laki' ? 'selected' : '' }}>Laki
                                - Laki</option>
                            <option value="Perempuan" {{ $data->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                Perempuan
                            </option>
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
