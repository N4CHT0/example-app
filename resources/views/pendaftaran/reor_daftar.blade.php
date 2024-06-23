@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <h5>Pendaftaran Diklat REOR</h5>
                <div class="card-body">
                    <form action="{{ route('pendaftaran.storeDiklat', ['jenisDiklat' => 'reor']) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="pilihan_diklat">Pilihan Diklat</label>
                            <select class="form-control" id="pilihan_diklat" name="pilihan_diklat" required>
                                <!-- Pilihan role sesuai dengan kebutuhan -->
                                <option value="SOU-MUALIM">SOU-MUALIM</option>
                                <option value="SOU-REGULAR">SOU-REGULAR</option>
                                <option value="SRE-I">SRE-I</option>
                                <option value="SRE-II">SRE-II</option>
                                <option value="SOU-M-COC-GMDSS">SOU-M + COC GMDSS</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="periode_ujian_negara">Periode Ujian Negara</label>
                            <select class="form-control" id="periode_ujian_negara" name="periode_ujian_negara" required>
                                <option value="JANUARI">JANUARI</option>
                                <option value="FEBRUARI">FEBRUARI</option>
                                <option value="MARET">MARET</option>
                                <option value="APRIL">APRIL</option>
                                <option value="MEI">MEI</option>
                                <option value="JUNI">JUNI</option>
                                <option value="JUNI">JUNI</option>
                                <option value="AGUSTUS">AGUSTUS</option>
                                <option value="SEPTEMBER">SEPTEMBER</option>
                                <option value="OKTOBER">OKTOBER</option>
                                <option value="NOVEMBER">NOVEMBER</option>
                                <option value="DESEMBER">DESEMBER</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text" class="form-control" id="nik" name="nik"
                                value="{{ Auth::user()->id }}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="npwp">NPWP</label>
                            <input type="text" class="form-control" id="npwp" name="npwp">
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                                value="{{ Auth::user()->nama_lengkap }}" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir"
                                value="{{ Auth::user()->tempat_lahir }}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                value="{{ Auth::user()->tanggal_lahir }}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="no_telp">No Telp</label>
                            <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                                value="{{ Auth::user()->no_telp }}" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nama_instansi">Nama Instansi</label>
                            <input type="text" class="form-control" id="nama_instansi" name="nama_instansi" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat"
                                value="{{ Auth::user()->alamat }}" required>
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
                            <label for="pekerjaan">Pekerjaan</label>
                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status" required>
                                <!-- Pilihan role sesuai dengan kebutuhan -->
                                <option value="MENIKAH">MENIKAH</option>
                                <option value="LAJANG">LAJANG</option>
                            </select>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                            <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="penghasilan_ibu">Penghasilan Ibu</label>
                            <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                            <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="penghasilan_ayah">Penghasilan Ayah</label>
                            <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah"
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
                            <label for="scan_foto_ktp">Upload Scan/Foto KTP</label>
                            <input type="file" class="form-control" id="scan_foto_ktp" name="scan_foto_ktp" required>
                        </div>
                        <div id="sre_i_sre_ii" style="display: none;">
                            <br>
                            <div class="form-group">
                                <label for="scan_sertifikat_sou">Upload Sertifikat SOU/ORU</label>
                                <input type="file" class="form-control" id="scan_sertifikat_sou"
                                    name="scan_sertifikat_sou">
                            </div>
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="scan_foto_ijazah_terakhir">Upload Scan/Foto Ijazah Terakhir</label>
                            <input type="file" class="form-control" id="scan_foto_ijazah_terakhir"
                                name="scan_foto_ijazah_terakhir" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_akte">Upload Scan/Foto Akte Kelahiran</label>
                            <input type="file" class="form-control" id="scan_foto_akte" name="scan_foto_akte"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="scan_foto_npwp">Upload Scan/Foto NPWP</label>
                            <input type="file" class="form-control" id="scan_foto_npwp" name="scan_foto_npwp"
                                required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ Auth::user()->email }}" readonly>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                <!-- Pilihan role sesuai dengan kebutuhan -->
                                <option value="LAKI-LAKI">LAKI-LAKI</option>
                                <option value="PEREMPUAN">PEREMPUAN</option>
                                <!-- Tambahkan pilihan lain jika diperlukan -->
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

        document.getElementById('pilihan_diklat').addEventListener('change', function() {
            var selectedValue = this.value;
            var souCocGmdssDiv = document.getElementById('sre_i_sre_ii');
            if (selectedValue === 'SRE-I', 'SRE-II') {
                souCocGmdssDiv.style.display = 'block';
            } else {
                souCocGmdssDiv.style.display = 'none';
            }
        });
    </script>
@endsection
