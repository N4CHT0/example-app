@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Pengguna SIMBBU
                </p>
                <form action="{{ route('Users.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap :</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                            value="{{ $data->nama_lengkap }}">
                    </div>

                    <div class="form-group">
                        <label for="jenis_akun">Jenis Akun</label>
                        <select class="form-control" id="jenis_akun" name="jenis_akun" required>
                            <option value="admin" {{ $data->jenis_akun == 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="siswa" {{ $data->jenis_akun == 'siswa' ? 'selected' : '' }}>Siswa</option>
                            <option value="pengajar" {{ $data->jenis_akun == 'pengajar' ? 'selected' : '' }}>Pengajar
                            </option>
                            <option value="pegawai" {{ $data->jenis_akun == 'pegawai' ? 'selected' : '' }}>Pegawai
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_diklat">Jenis Diklat</label>
                        <select class="form-control" id="jenis_diklat" name="jenis_diklat" required>
                            <option value="COP" {{ $data->jenis_diklat == 'COP' ? 'selected' : '' }}>COP</option>
                            <option value="REOR" {{ $data->jenis_diklat == 'REOR' ? 'selected' : '' }}>REOR</option>
                            <option value="" {{ $data->jenis_diklat == '' ? 'selected' : '' }}>BUKAN SISWA</option>
                            <option value="GMDSS" {{ $data->jenis_diklat == 'GMDSS' ? 'selected' : '' }}>GMDSS</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" autocomplete="email"
                            value="{{ $data->email }}"required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
