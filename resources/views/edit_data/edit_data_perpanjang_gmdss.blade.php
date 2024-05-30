@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Perpanjangan Sertifikat GMDSS
                </p>
                <form action="{{ route('PerpanjangGMDSS.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kewarganegaraan">Kewarganegaraan</label>
                        <select class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                            <option value="WNI" {{ $data->kewarganegaraan == 'WNI' ? 'selected' : '' }}>Warga Negara
                                Indonesia</option>
                            <option value="WNA" {{ $data->kewarganegaraan == 'WNA' ? 'selected' : '' }}>Warga Negara
                                Asing</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Menikah" {{ $data->status == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                            <option value="Belum Menikah" {{ $data->status == 'Belum Menikah' ? 'selected' : '' }}>Belum
                                Menikah</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="lembaga_diklat">Lembaga Diklat</label>
                        <select class="form-control" id="lembaga_diklat" name="lembaga_diklat" required>
                            <option value="Politeknik Ilmu Pelayaran Semarang"
                                {{ $data->lembaga_diklat == 'Politeknik Ilmu Pelayaran Semarang' ? 'selected' : '' }}>
                                Politeknik Ilmu Pelayaran Semarang
                            </option>
                            <option value="Bina Sena" {{ $data->lembaga_diklat == 'Bina Sena' ? 'selected' : '' }}>Bina Sena
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $data->nik }}"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="seafare_code">Seafare Code</label>
                        <input type="text" class="form-control" id="seafare_code" name="seafare_code"
                            value="{{ $data->seafare_code }}" required>
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
                            value="{{ $data->no_telp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat"
                            autocomplete="street-address" value="{{ $data->alamat }}" required>
                    </div>

                    <div class="form-group">
                        <label for="provinsi">Provinsi</label>
                        <input type="text" class="form-control" id="provinsi" name="provinsi"
                            value="{{ $data->provinsi }}" required>
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
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                            value="{{ $data->kode_pos }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ $data->pekerjaan }}"required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                        <input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung"
                            value="{{ $data->nama_ibu_kandung }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ayah_kandung">Nama Ayah Kandung</label>
                        <input type="text" class="form-control" id="nama_ayah_kandung" name="nama_ayah_kandung"
                            value="{{ $data->nama_ayah_kandung }}"required>
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
                            value="{{ $data->foto }}>
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
                        <label for="scan_foto_ijazah_laut">Upload Scan/Foto Ijazah Laut</label>
                        <input type="file" class="form-control" id="scan_foto_ijazah_laut"
                            name="scan_foto_ijazah_laut" value="{{ $data->scan_foto_ijazah_laut }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_masa_layar">Upload Scan/Foto Masa Layar</label>
                        <input type="file" class="form-control" id="scan_foto_masa_layar" name="scan_foto_masa_layar"
                            value="{{ $data->scan_foto_masa_layar }}>
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_mcu">Upload Scan/Foto Sertifikat MCU</label>
                        <input type="file" class="form-control" id="scan_foto_mcu" name="scan_foto_mcu"
                            value="{{ $data->scan_foto_mcu }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_sertifikat_bst">Upload Scan/Foto Sertifikat BST</label>
                        <input type="file" class="form-control" id="scan_foto_sertifikat_bst"
                            name="scan_foto_sertifikat_bst" value="{{ $data->scan_foto_sertifikat_bst }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_ktp">Upload Scan/Foto KTP</label>
                        <input type="file" class="form-control" id="scan_foto_ktp" name="scan_foto_ktp"
                            value="{{ $data->scan_foto_ktp }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_akte">Upload Scan/Foto Akte</label>
                        <input type="file" class="form-control" id="scan_foto_akte" name="scan_foto_akte"
                            value="{{ $data->scan_foto_akte }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                            value="{{ $data->email }}"required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <option value="Laki - Laki" {{ $data->jenis_kelamin == 'Laki - Laki' ? 'selected' : '' }}>Laki
                                - Laki
                            </option>
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
