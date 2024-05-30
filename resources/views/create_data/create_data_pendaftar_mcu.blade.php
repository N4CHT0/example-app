@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Pendaftaran Sertifikat MCU
                </p>
                <form action="{{ route('DaftarMCU.create') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan_diatas_kapal">Jabatan Diatas Kapal</label>
                        <input type="text" class="form-control" id="jabatan_diatas_kapal" name="jabatan_diatas_kapal"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="edit_foto">Edit Foto</label><br>
                        <input type="radio" id="edit_foto" name="edit_foto" value="YA" required>
                        <label for="edit_foto">Ya</label>
                        <input type="radio" id="edit_foto_tidak" name="edit_foto" value="TIDAK" required>
                        <label for="edit_foto_tidak">Tidak</label>
                    </div>

                    <div class="form-group">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
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
                        <label for="foto_ktp">Upload Foto KTP</label>
                        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp">
                    </div>

                    <div class="form-group">
                        <label for="foto_bst">Upload Foto BST</label>
                        <input type="file" class="form-control" id="foto_bst" name="foto_bst">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
