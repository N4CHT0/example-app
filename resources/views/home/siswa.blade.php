@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-info d-flex justify-content-between align-items-center">
                <span style="color: white; font-size: 20px;">Biodata</span>
                <a href="{{ route('Peserta.Edit', ['user' => $user->id]) }}"
                    class="btn btn-success d-flex align-items-center ml-auto" style="color: white;">
                    <i class="fas fa-edit" style="margin-right: 5px;"></i> Edit Data
                </a>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img class="detail-value" id="foto_sertifikat"
                            src="{{ asset('storage/img/' . Auth::user()->foto) }}" }}" alt="Foto"
                            style="max-width: 380px; height: 380px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="nama">Nama:</label>
                                    <span class="detail-value" id="nama">{{ Auth::user()->nama_lengkap }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">NIK:</label>
                                    <span class="detail-value" id="nama2">36124100280001</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">Tempat Lahir:</label>
                                    <span class="detail-value" id="nama2">{{ Auth::user()->tempat_lahir }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">Tanggal Lahir:</label>
                                    <span class="detail-value" id="nama2">{{ Auth::user()->tanggal_lahir }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">Agama:</label>
                                    <span class="detail-value" id="nama2">Kristen</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">Email:</label>
                                    <span class="detail-value" id="nama2">{{ Auth::user()->email }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">No Telp:</label>
                                    <span class="detail-value" id="nama2">{{ Auth::user()->no_telp }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
