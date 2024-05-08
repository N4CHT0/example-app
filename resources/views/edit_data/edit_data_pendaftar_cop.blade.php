@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Pendaftaran Diklat COP
                </p>
                <form action="{{ route('DaftarCOP.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="jenis_sertifikat_cop">Jenis Sertifikat COP</label>
                        <select class="form-control" id="jenis_sertifikat_cop" name="jenis_sertifikat_cop" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="MC" {{ $data->jenis_sertifikat_cop == 'MC' ? 'selected' : '' }}>MC</option>
                            <option value="MFA {{ $data->jenis_sertifikat_cop == 'MFA' ? 'selected' : '' }}">MFA</option>
                            <option value="SSO" {{ $data->jenis_sertifikat_cop == 'SSO' ? 'selected' : '' }}>SSO</option>
                            <option value="SAT" {{ $data->jenis_sertifikat_cop == 'SAT' ? 'selected' : '' }}>SAT</option>
                            <option value="SATSDSD" {{ $data->jenis_sertifikat_cop == 'SATSDSD' ? 'selected' : '' }}>SATSDSD
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="seafare_code">Seafare Code</label>
                        <input type="text" class="form-control" id="seafare_code" name="seafare_code"
                            value="{{ $data->seafare_code }}" required>
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
                        <input type="number" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                            value="{{ $data->no_telp }}" required>
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
                        <label for="kelurahan_desa">Kelurahan/Desa</label>
                        <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa"
                            value="{{ $data->kelurahan_desa }}" required>
                    </div>

                    <div class="form-group">
                        <label for="rt_rw">RT/RW</label>
                        <input type="text" class="form-control" id="rt_rw" name="rt_rw"
                            value="{{ $data->rt_rw }}" required>
                    </div>

                    <div class="form-group">
                        <label for="kode_pos">Kode Pos</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                            value="{{ $data->kode_pos }}" required>
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
                        <label for="nama_ayah">Nama Ayah</label>
                        <input type="text" class="form-control" id="nama_ayah" name="nama_ayah"
                            value="{{ $data->nama_ayah }}" required>
                    </div>

                    <div class="form-group">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto" accept="image/*"
                            value="{{ $data->foto }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                            value="{{ $data->email }}"required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
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
