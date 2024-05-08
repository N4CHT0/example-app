@extends('pendaftaran.layout_daftar')
@section('content')
    <p>
        Pendaftaran Sertifikat MCU
    </p>

    <form action="{{ route('DaftarMCU.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="name" required>
        </div>

        <div class="form-group">
            <label for="jabatan_diatas_kapal">Jabatan Diatas Kapal</label>
            <input type="text" class="form-control" id="jabatan_diatas_kapal" name="jabatan_diatas_kapal" required>
        </div>

        <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel" required>
        </div>

        <div class="form-group">
            <label for="foto">Upload Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" required>
        </div>
        <div class="form-group">
            <label for="foto_ktp">Upload Foto KTP</label>
            <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" required>
        </div>
        <div class="form-group">
            <label for="foto_bst">Upload Foto BST</label>
            <input type="file" class="form-control" id="foto_bst" name="foto_bst" required>
        </div>

        <div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>
@endsection
