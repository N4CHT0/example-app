@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="jenis_fasilitas">Jenis Fasilitas : </label>
                    <span class="detail-value" id="jenis_fasilitas">{{ $data->jenis_fasilitas }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_fasilitas">Nama Fasilitas : </label>
                    <span class="detail-value" id="nama_fasilitas">{{ $data->nama_fasilitas }}</span>
                </div>

                <div class="form-group">
                    <label for="jumlah"> Jumlah : </label>
                    <span class="detail-value" id="jumlah">{{ $data->jumlah }}</span>
                </div>

                <div class="form-group">
                    <label for="kondisi"> Kondisi : </label>
                    <span class="detail-value" id="kondisi">{{ $data->kondisi }}</span>
                </div>

                <div class="form-group">
                    <label for="status">Status : </label>
                    <span class="detail-value" id="status">{{ $data->status }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
