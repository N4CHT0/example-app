@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Tambah Data Pengguna SIMBBU
                </p>
                <form action="{{ route('Users.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_akun">Jenis Akun</label>
                        <select class="form-control" id="jenis_akun" name="jenis_akun" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="admin">ADMIN</option>
                            <option value="siswa">SISWA</option>
                            <option value="pengajar">PENGAJAR</option>
                            <option value="pegawai">PEGAWAI</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jenis_diklat">Jenis Diklat</label>
                        <select class="form-control" id="jenis_diklat" name="jenis_diklat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="COP">COP</option>
                            <option value="GMDSS">GMDSS</option>
                            <option value="REOR">REOR</option>
                            <option value="">BUKAN SISWA</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
