@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <h5>Pendaftaran Perpanjangan GMDSS</h5>
                <div class="card-body">
                    <form action="{{ route('pendaftaran.storeDiklat', ['jenisDiklat' => 'perpanjang_gmdss']) }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="kewarganegaraan">Kewarganegaraan</label>
                            <select class="form-control" id="kewarganegaraan" name="kewarganegaraan" required>
                                <option value="WNI">Warga Negara Indonesia</option>
                                <option value="WNA">Warga Negara Asing</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis_perpanjang">Jenis Perpanjang</label>
                            <select class="form-control" id="jenis_perpanjang" name="jenis_perpanjang" required>
                                <option value="REVAL">REVAL</option>
                                <option value="ENDORSE">ENDORSE</option>
                                <option value="REVAL & ENDORSE">REVAL & ENDORSE</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <option value="MENIKAH">MENIKAH</option>
                                <option value="LAJANG">LAJANG</option>
                                <!-- Tambahkan pilihan lain jika diperlukan -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lembaga_diklat">Lembaga Diklat</label>
                            <select class="form-control" id="lembaga_diklat" name="lembaga_diklat" required>
                                <option value="POLITEKNIK ILMU PELAYARAN SEMARANG">POLITEKNIK ILMU PELAYARAN SEMARANG
                                </option>
                                <option value="BINA SENA">BINA SENA</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ Auth::user()->id }}" required>
                        </div>
                        <div class="form-group">
                            <label for="seafare_code">Seafare Code</label>
                            <input type="text" class="form-control" id="seafare_code" name="seafare_code" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                autocomplete="name" value="{{ Auth::user()->nama_lengkap }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ Auth::user()->tempat_lahir }}" required>
                        </div>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ Auth::user()->tanggal_lahir }}" required>
                        </div>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp"
                                value="{{ Auth::user()->no_telp }}" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ Auth::user()->alamat }}" required>
                        </div>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi">
                                <option value="">Pilih Provinsi...</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kabupaten_kota">Kabupaten/Kota</label>
                            <select class="form-control" name="kabupaten_kota" id="kabupaten_kota">
                                <option value="Pilih Kabupaten/Kota..."></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control" name="kecamatan" id="kecamatan">
                                <option value="Pilih Kecamatan..."></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kelurahan_desa">Kelurahan/Desa</label>
                            <select class="form-control" name="kelurahan_desa" id="kelurahan_desa">
                                <option value="Pilih Kelurahan/Desa..."></option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kode_pos">Kode Pos</label>
                            <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
                        </div>
                        <div class="form-group">
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ibu_kandung">Nama Ibu Kandung</label>
                            <input type="text" class="form-control" id="nama_ibu_kandung" name="nama_ibu_kandung"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="nama_ayah_kandung">Nama Ayah Kandung</label>
                            <input type="text" class="form-control" id="nama_ayah_kandung" name="nama_ayah_kandung"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="edit_foto">Edit Foto</label><br>
                            <input type="radio" id="edit_foto" name="edit_foto" value="YA" required>
                            <label for="edit_foto">Ya</label>
                            <input type="radio" id="edit_foto_tidak" name="edit_foto" value="TIDAK" required>
                            <label for="edit_foto_tidak">Tidak</label>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="foto">Upload Foto</label>
                            <input type="file" class="form-control" id="foto" name="foto" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <h6 style="font-weight: bold" for="">Note : Ketentuan Foto</h6
                                style="font-weight: bold">
                            <h6 style="font-weight: bold" for="">1. Jas Hitam, Kemeja Putih, Dasi Hitam</h6
                                style="font-weight: bold">
                            <h6 style="font-weight: bold" for="">2. Apabila Tidak Punya, Melakukan Foto Selfie
                                Biasa, Terdapat Edit
                                Foto
                                Dengan Biaya
                                Tambahan Rp.50.000</h6 style="font-weight: bold">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_ijazah_laut">Upload Scan/Foto Ijazah Laut</label>
                            <input type="file" class="form-control" id="scan_foto_ijazah_laut"
                                name="scan_foto_ijazah_laut" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_masa_layar">Upload Scan/Foto Masa Layar</label>
                            <input type="file" class="form-control" id="scan_foto_masa_layar"
                                name="scan_foto_masa_layar" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_mcu">Upload Scan/Foto Sertifikat MCU</label>
                            <input type="file" class="form-control" id="scan_foto_mcu" name="scan_foto_mcu" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_sertifikat_bst">Upload Scan/Foto Sertifikat BST</label>
                            <input type="file" class="form-control" id="scan_foto_sertifikat_bst"
                                name="scan_foto_sertifikat_bst" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_ktp">Upload Scan/Foto KTP</label>
                            <input type="file" class="form-control" id="scan_foto_ktp" name="scan_foto_ktp" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_akte">Upload Scan/Foto Akte</label>
                            <input type="file" class="form-control" id="scan_foto_akte" name="scan_foto_akte"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                            </select>
                        </div>
                        <br>
                        <div>
                            <button type="submit" class="btn btn-primary">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('provinsi').addEventListener('change', function() {
            var provinceId = this.value;
            fetch(`/getRegencies/${provinceId}`)
                .then(response => response.json())
                .then(data => {
                    var kabupatenSelect = document.getElementById('kabupaten_kota');
                    kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota...</option>';
                    data.forEach(function(kabupaten) {
                        var option = document.createElement('option');
                        option.value = kabupaten.id;
                        option.text = kabupaten.name;
                        kabupatenSelect.appendChild(option);
                    });
                });
        });

        document.getElementById('kabupaten_kota').addEventListener('change', function() {
            var regencyId = this.value;
            fetch(`/getDistricts/${regencyId}`)
                .then(response => response.json())
                .then(data => {
                    var kecamatanSelect = document.getElementById('kecamatan');
                    kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan...</option>';
                    data.forEach(function(kecamatan) {
                        var option = document.createElement('option');
                        option.value = kecamatan.id;
                        option.text = kecamatan.name;
                        kecamatanSelect.appendChild(option);
                    });
                });
        });

        document.getElementById('kecamatan').addEventListener('change', function() {
            var districtId = this.value;
            fetch(`/getVillages/${districtId}`)
                .then(response => response.json())
                .then(data => {
                    var kelurahanDesaSelect = document.getElementById('kelurahan_desa');
                    kelurahanDesaSelect.innerHTML = '<option value="">Pilih Kelurahan/Desa...</option>';
                    data.forEach(function(kelurahanDesa) {
                        var option = document.createElement('option');
                        option.value = kelurahanDesa.id;
                        option.text = kelurahanDesa.name;
                        kelurahanDesaSelect.appendChild(option);
                    });
                });
        });
    </script>
@endsection
