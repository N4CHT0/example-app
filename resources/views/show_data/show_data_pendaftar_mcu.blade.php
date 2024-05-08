@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap : </label>
                    <span class="detail-value" id="nama_lengkap">{{ $data->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="jabatan_diatas_kapal">Jabatan Diatas Kapal : </label>
                    <span class="detail-value" id="jabatan_diatas_kapal">{{ $data->jabatan_diatas_kapal }}</span>
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp : </label>
                    <span class="detail-value" id="no_telp">{{ $data->no_telp }}</span>
                </div>

                <div class="form-group">
                    <label for="foto">Foto : </label>
                    <br>
                    <img class="detail-value" id="foto" src="{{ asset('storage/img/' . $data->foto) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="foto_ktp">Foto KTP : </label>
                    <br>
                    <img class="detail-value" id="foto_ktp" src="{{ asset('storage/img/' . $data->foto_ktp) }}"
                        alt="Foto" style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="foto_bst">Foto BST : </label>
                    <br>
                    <img class="detail-value" id="foto_bst" src="{{ asset('storage/img/' . $data->foto_bst) }}"
                        alt="Foto" style="max-width: 300px;">
                </div>
            </div>
        </div>
    </div>
@endsection
