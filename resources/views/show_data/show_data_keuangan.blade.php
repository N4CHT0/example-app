@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nomor_bukti">Nomor Bukti : </label>
                    <span class="detail-value" id="nomor_bukti">{{ $data->nomor_bukti }}</span>
                </div>

                <div class="form-group">
                    <label for="tanggal_pembayaran">Tanggal Pembayaran : </label>
                    <span class="detail-value" id="tanggal_pembayaran">{{ $data->tanggal_pembayaran }}</span>
                </div>

                <div class="form-group">
                    <label for="status_pembayaran"> Status Pembayaran: </label>
                    <span class="detail-value" id="status_pembayaran">{{ $data->status_pembayaran }}</span>
                </div>

                <div class="form-group">
                    <label for="berita_pembayaran"> Berita Pembayaran: </label>
                    <span class="detail-value" id="berita_pembayaran">{{ $data->berita_pembayaran }}</span>
                </div>

                <div class="form-group">
                    <label for="jumlah_uang">Jumlah Uang : </label>
                    <span class="detail-value" id="jumlah_uang">{{ $data->jumlah_uang }}</span>
                </div>

                <div class="form-group">
                    <label for="nama">Nama : </label>
                    <span class="detail-value" id="nama">{{ $data->nama }}</span>
                </div>

                <div class="form-group">
                    <label for="petugas">Petugas : </label>
                    <span class="detail-value" id="petugas">{{ $data->petugas }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
