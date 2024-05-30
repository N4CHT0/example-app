@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nama_mata_pelajaran">Nama Mata Pelajaran : </label>
                    <span class="detail-value" id="nama_mata_pelajaran">{{ $data->nama_mata_pelajaran }}</span>
                </div>

                <div class="form-group">
                    <label for="jenis_diklat">Jenis Diklat : </label>
                    <span class="detail-value" id="jenis_diklat">{{ $data->jenis_diklat }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
