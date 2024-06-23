@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <h5>Pendaftaran Perpanjangan Sertifikat REOR</h5>
                <div class="card-body">
                    <form action="{{ route('pendaftaran.storeDiklat', ['jenisDiklat' => 'perpanjang_reor']) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <br>
                        <div class="form-group">
                            <label for="jenis_sertifikat">Jenis Sertifikat</label>
                            <select class="form-control" id="jenis_sertifikat" name="jenis_sertifikat" required>
                                <!-- Pilihan role sesuai dengan kebutuhan -->
                                <option value="SRE">SRE</option>
                                <option value="SOU">SOU</option>
                                <!-- Tambahkan pilihan lain jika diperlukan -->
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="no_sertifikat">Nomor Sertifikat</label>
                            <input type="text" class="form-control" id="no_sertifikat" name="no_sertifikat" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                autocomplete="name" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                autocomplete="street-address" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select class="form-control" id="agama" name="agama" required>
                                <!-- Pilihan role sesuai dengan kebutuhan -->
                                <option value="ISLAM">ISLAM</option>
                                <option value="KRISTEN">KRISTEN</option>
                                <option value="KATHOLIK">KATHOLIK</option>
                                <option value="HINDU">HINDU</option>
                                <option value="BUDHA">BUDHA</option>
                                <option value="KHONGHUCU">KHONGHUCU</option>
                                <!-- Tambahkan pilihan lain jika diperlukan -->
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="provinsi">Provinsi</label>
                            <select class="form-control" name="provinsi" id="provinsi">
                                <option value="">Pilih Provinsi...</option>
                                @foreach ($provinsi as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="kabupaten_kota">Kabupaten/Kota</label>
                            <select class="form-control" name="kabupaten_kota" id="kabupaten_kota">
                                <option value="Pilih Kabupaten/Kota..."></option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="kecamatan">Kecamatan</label>
                            <select class="form-control" name="kecamatan" id="kecamatan">
                                <option value="Pilih Kecamatan..."></option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="kelurahan_desa">Kelurahan/Desa</label>
                            <select class="form-control" name="kelurahan_desa" id="kelurahan_desa">
                                <option value="Pilih Kelurahan/Desa..."></option>
                            </select>
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
                                Biasa, Terdapat Edit Foto
                                Dengan Biaya
                                Tambahan Rp.50.000</h6 style="font-weight: bold">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_npwp">Upload Scan/Foto NPWP</label>
                            <input type="file" class="form-control" id="scan_foto_npwp" name="scan_foto_npwp"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_ijazah">Upload Scan/Foto Ijazah</label>
                            <input type="file" class="form-control" id="scan_foto_ijazah" name="scan_foto_ijazah"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_sertifikat">Upload Scan/Foto Sertifikat</label>
                            <input type="file" class="form-control" id="scan_foto_sertifikat"
                                name="scan_foto_sertifikat" required>
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
