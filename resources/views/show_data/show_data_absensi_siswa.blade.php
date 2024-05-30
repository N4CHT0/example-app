@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="id_peserta_ujian">Nama : </label>
                    <span class="detail-value" id="id_peserta_ujian">{{ $data->pesertaUjian->Users->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_mata_pelajaran"> Mata Pelajaran : </label>
                    <span class="detail-value"
                        id="nama_mata_pelajaran">{{ $data->MataPelajaran->nama_mata_pelajaran }}</span>
                </div>

                <div class="form-group">
                    <label for="status">Status : </label>
                    <span class="detail-value" id="status">{{ $data->status }}</span>
                </div>

                <div class="form-group">
                    <label for="pertemuan"> Pertemuan : </label>
                    <span class="detail-value" id="pertemuan">{{ $data->pertemuan }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
