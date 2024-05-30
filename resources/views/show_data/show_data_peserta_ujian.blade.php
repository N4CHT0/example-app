@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="id_user">Nama Peserta Ujian : </label>
                    <span class="detail-value" id="id_user">{{ $data->Users->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="id_user">Jenis Diklat : </label>
                    <span class="detail-value" id="id_user">{{ $data->Users->jenis_diklat }}</span>
                </div>

                <div class="form-group">
                    <label for="status_peserta"> Status Peserta : </label>
                    <span class="detail-value" id="status_peserta">{{ $data->status_peserta }}</span>
                </div>

                <div class="form-group">
                    <label for="periode_ujian"> Periode Ujian : </label>
                    <span class="detail-value" id="periode_ujian">{{ $data->periode_ujian }}</span>
                </div>

                <div class="form-group">
                    <label for="nomor_peserta_ujian"> Nomor Peserta Ujian : </label>
                    <span class="detail-value" id="nomor_peserta_ujian">{{ $data->nomor_peserta_ujian }}</span>
                </div>

                <div class="form-group">
                    <label for="angkatan"> Angkatan : </label>
                    <span class="detail-value" id="angkatan">{{ $data->angkatan }}</span>
                </div>

            </div>
        </div>
    </div>
@endsection
