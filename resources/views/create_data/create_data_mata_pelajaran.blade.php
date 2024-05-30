@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Mata Pelajaran
                </p>
                <form action="{{ route('MataPelajaran.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama_mata_pelajaran">Nama Mata Pelajaran</label>
                        <input type="text" class="form-control" id="nama_mata_pelajaran" name="nama_mata_pelajaran"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="jenis_diklat">Jenis Diklat</label>
                        <select class="form-control" id="jenis_diklat" name="jenis_diklat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Diklat REOR">Diklat REOR</option>
                            <option value="Diklat COP">Diklat COP</option>
                            <option value="Diklat GMDSS">Diklat GMDSS</option>
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
