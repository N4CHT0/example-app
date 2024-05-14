@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="jenis_sertifikat">Jenis Sertifikat : </label>
                    <span class="detail-value" id="jenis_sertifikat">{{ $data->jenis_sertifikat }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik : </label>
                    <span class="detail-value" id="nama_pemilik">{{ $data->nama_pemilik }}</span>
                </div>

                <div class="form-group">
                    <label for="no_sertifikat">No Sertifikat : </label>
                    <span class="detail-value" id="no_sertifikat">{{ $data->no_sertifikat }}</span>
                </div>

                <div class="form-group">
                    <label for="status_sertifikat">Status Sertifikat : </label>
                    <span class="detail-value" id="status_sertifikat">{{ $data->status_sertifikat }}</span>
                </div>

                <div class="form-group">
                    <label for="foto_sertifikat">Foto Sertifikat : </label>
                    <br>
                    <img class="detail-value" id="foto_sertifikat"
                        src="{{ asset('storage/img/' . $data->foto_sertifikat) }}" alt="Foto" style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="bukti_pengambilan">Bukti Pengambilan : </label>
                    <br>
                    <img class="detail-value" id="bukti_pengambilan"
                        src="{{ asset('storage/img/' . $data->bukti_pengambilan) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="bukti_pengiriman">Bukti Pengiriman : </label>
                    <br>
                    <img class="detail-value" id="bukti_pengiriman"
                        src="{{ asset('storage/img/' . $data->bukti_pengiriman) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp : </label>
                    <span class="detail-value" id="no_telp">{{ $data->no_telp }}</span>
                </div>

                <div class="form-group">
                    <label for="email">Email : </label>
                    <span class="detail-value" id="email">{{ $data->email }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
