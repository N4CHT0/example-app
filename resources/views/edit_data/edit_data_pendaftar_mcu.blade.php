@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Pendaftaran Sertifikat MCU
                </p>
                <form action="{{ route('DaftarMCU.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="name"
                            value="{{ $data->nama_lengkap }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jabatan_diatas_kapal">Jabatan Diatas Kapal</label>
                        <input type="text" class="form-control" id="jabatan_diatas_kapal" name="jabatan_diatas_kapal"
                            value="{{ $data->jabatan_diatas_kapal }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                            value="{{ $data->no_telp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="edit_foto">Edit Foto</label><br>
                        <input type="radio" id="edit_foto_ya" name="edit_foto" value="YA"
                            {{ $data->edit_foto == 'YA' ? 'checked' : '' }} required>
                        <label for="edit_foto_ya">Ya</label>
                        <input type="radio" id="edit_foto_tidak" name="edit_foto" value="TIDAK"
                            {{ $data->edit_foto == 'TIDAK' ? 'checked' : '' }} required>
                        <label for="edit_foto_tidak">Tidak</label>
                    </div>


                    <div class="form-group">
                        <label for="foto">Upload Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto"
                            value="{{ $data->foto }}">
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
                        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp"
                            value="{{ $data->foto_ktp }}">
                    </div>
                    <div class="form-group">
                        <label for="foto_bst">Upload Foto BST</label>
                        <input type="file" class="form-control" id="foto_bst" name="foto_bst"
                            value="{{ $data->foto_bst }}">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
