@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Pendaftaran Diklat REOR
                </p>
                <form action="{{ route('DaftarREOR.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="pilihan_diklat">Pilihan Diklat</label>
                        <select class="form-control" id="pilihan_diklat" name="pilihan_diklat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="SRE-I" {{ $data->pilihan_diklat == 'SRE-I' ? 'selected' : '' }}>SRE-I</option>
                            <option value="SRE-II" {{ $data->pilihan_diklat == 'SRE-II' ? 'selected' : '' }}>SRE-II</option>
                            <option value="SOU-REGULAR" {{ $data->pilihan_diklat == 'SOU-REGULAR' ? 'selected' : '' }}>
                                SOU-REGULAR
                            </option>
                            <option value="SOU-NAUTIKA" {{ $data->pilihan_diklat == 'SOU-NAUTIKA' ? 'selected' : '' }}>
                                SOU-NAUTIKA
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="periode_ujian_negara">Periode Ujian Negara</label>
                        <select class="form-control" id="periode_ujian_negara" name="periode_ujian_negara" required>
                            <option value="Januari" {{ $data->periode_ujian_negara == 'Januari' ? 'selected' : '' }}>Januari
                            </option>
                            <option value="Februari" {{ $data->periode_ujian_negara == 'Februari' ? 'selected' : '' }}>
                                Februari
                            </option>
                            <option value="Maret" {{ $data->periode_ujian_negara == 'Maret' ? 'selected' : '' }}>Maret
                            </option>
                            <option value="April" {{ $data->periode_ujian_negara == 'April' ? 'selected' : '' }}>April
                            </option>
                            <option value="Mei" {{ $data->periode_ujian_negara == 'Mei' ? 'selected' : '' }}>Mei</option>
                            <option value="Juni" {{ $data->periode_ujian_negara == 'Juni' ? 'selected' : '' }}>Juni
                            </option>
                            <option value="Juli" {{ $data->periode_ujian_negara == 'Juli' ? 'selected' : '' }}>Juli
                            </option>
                            <option value="Agustus" {{ $data->periode_ujian_negara == 'Agustus' ? 'selected' : '' }}>
                                Agustus
                            </option>
                            <option value="September" {{ $data->periode_ujian_negara == 'September' ? 'selected' : '' }}>
                                September
                            </option>
                            <option value="Oktober" {{ $data->periode_ujian_negara == 'Oktober' ? 'selected' : '' }}>
                                Oktober
                            </option>
                            <option value="November" {{ $data->periode_ujian_negara == 'November' ? 'selected' : '' }}>
                                November
                            </option>
                            <option value="Desember" {{ $data->periode_ujian_negara == 'Desember' ? 'selected' : '' }}>
                                Desember
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input type="text" class="form-control" id="nik" name="nik"
                            value="{{ $data->nik }}" required>
                    </div>

                    <div class="form-group">
                        <label for="npwp">NPWP</label>
                        <input type="text" class="form-control" id="npwp" name="npwp"
                            value="{{ $data->npwp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="name"
                            value="{{ $data->nama_lengkap }}" required>
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
                        <label for="nama_instansi">Nama Instansi</label>
                        <input type="text" class="form-control" id="nama_instansi" name="nama_instansi"
                            value="{{ $data->nama_instansi }}" required>
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
                        <label for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"
                            value="{{ $data->pekerjaan }}" required>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" id="status" name="status"
                            value="{{ $data->status }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ibu">Nama Ibu</label>
                        <input type="text" class="form-control" id="nama_ibu" name="nama_ibu"
                            value="{{ $data->nama_ibu }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                        <input type="text" class="form-control" id="pekerjaan_ibu" name="pekerjaan_ibu"
                            value="{{ $data->pekerjaan_ibu }}" required>
                    </div>

                    <div class="form-group">
                        <label for="penghasilan_ibu">Penghasilan Ibu</label>
                        <input type="text" class="form-control" id="penghasilan_ibu" name="penghasilan_ibu"
                            value="{{ $data->penghasilan_ibu }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                            value="{{ $data->nama_ayah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                        <input type="text" class="form-control" id="pekerjaan_ayah" name="pekerjaan_ayah"
                            value="{{ $data->pekerjaan_ayah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="penghasilan_ayah">Penghasilan Ayah</label>
                        <input type="text" class="form-control" id="penghasilan_ayah" name="penghasilan_ayah"
                            value="{{ $data->penghasilan_ayah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto"
                            value="{{ $data->foto }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_ktp">Upload Scan/Foto KTP</label>
                        <input type="file" class="form-control" id="scan_foto_ktp" name="scan_foto_ktp"
                            value="{{ $data->scan_foto_ktp }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_ijazah_terakhir">Upload Scan/Foto Ijazah Terakhir</label>
                        <input type="file" class="form-control" id="scan_foto_ijazah_terakhir"
                            name="scan_foto_ijazah_terakhir" value="{{ $data->scan_foto_ijazah_terkhir }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_akte">Upload Scan/Foto Akte Kelahiran</label>
                        <input type="file" class="form-control" id="scan_foto_akte" name="scan_foto_akte"
                            value="{{ $data->scan_foto_akte }}">
                    </div>

                    <div class="form-group">
                        <label for="scan_foto_npwp">Upload Scan/Foto NPWP</label>
                        <input type="file" class="form-control" id="scan_foto_npwp" name="scan_foto_npwp"
                            value="{{ $data->scan_foto_npwp }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                            value="{{ $data->email }}" required>
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
