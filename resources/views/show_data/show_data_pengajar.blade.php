@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nama_pengajar">Nama Pengajar : </label>
                    <span class="detail-value" id="nama_pengajar">{{ $data->nama_pengajar }}</span>
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp : </label>
                    <span class="detail-value" id="no_telp">{{ $data->no_telp }}</span>
                </div>

                <div class="form-group">
                    <label for="email"> Email : </label>
                    <span class="detail-value" id="email">{{ $data->email }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_mata_pelajaran"> Mata Pelajaran : </label>
                    <span class="detail-value"
                        id="nama_mata_pelajaran">{{ $data->MataPelajaran->nama_mata_pelajaran }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
