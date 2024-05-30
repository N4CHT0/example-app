@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nama_mata_pelajaran">Mata Pelajaran : </label>
                    <span class="detail-value" id="nama_mata_pelajaran">{{ $data->MataPelajaran->nama_mata_pelajaran }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_pengajar">Nama Pengajar : </label>
                    <span class="detail-value" id="nama_pengajar">{{ $data->Pengajar->nama_pengajar }}</span>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal : </label>
                    <span class="detail-value" id="tanggal">{{ $data->tanggal }}</span>
                </div>
                <div class="form-group">
                    <label for="nomor_urut_peserta">Nomor Urut Peserta : </label>
                    <span class="detail-value" id="nomor_urut_peserta">{{ $data->nomor_urut_peserta }}</span>
                </div>
                <div class="form-group">
                    <label for="hari">Hari : </label>
                    <span class="detail-value" id="hari">{{ $data->hari }}</span>
                </div>
                <div class="form-group">
                    <label for="jam">Jam : </label>
                    <span class="detail-value" id="jam">{{ $data->jam }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
