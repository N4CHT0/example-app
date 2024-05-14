@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Inventory Sertifikat
                </p>
                <form action="{{ route('Inventory.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="jenis_sertifikat">Jenis Sertifikat:</label>
                        <input type="text" class="form-control" id="jenis_sertifikat" name="jenis_sertifikat"
                            value="{{ $data->jenis_sertifikat }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" autocomplete="name"
                            value="{{ $data->nama_pemilik }}" required>
                    </div>

                    <div class="form-group">
                        <label for="no_sertifikat">No Sertifikat</label>
                        <input type="number" class="form-control" id="no_sertifikat" name="no_sertifikat"
                            value="{{ $data->no_sertifikat }}">
                    </div>

                    <div class="form-group">
                        <label for="status_sertifikat">Status Sertifikat</label>
                        <select class="form-control" id="status_sertifikat" name="status_sertifikat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Tersedia" {{ $data->status_sertifikat == 'Tersedia' ? 'selected' : '' }}>
                                Tersedia</option>
                            <option value="Sudah Diterima"
                                {{ $data->status_sertifikat == 'Sudah Diterima' ? 'selected' : '' }}>
                                Sudah Diterima</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto_sertifikat">Upload Foto Sertifikat</label>
                        <input type="file" class="form-control" id="foto_sertifikat" name="foto_sertifikat"
                            value="{{ $data->foto_sertifikat }}">
                    </div>

                    <div class="form-group">
                        <label for="bukti_pengambilan">Upload Bukti Pengambilan</label>
                        <input type="file" class="form-control" id="bukti_pengambilan" name="bukti_pengambilan"
                            value="{{ $data->foto_ktp }}">
                    </div>
                    <div class="form-group">
                        <label for="bukti_pengiriman">Upload Bukti Pengiriman</label>
                        <input type="file" class="form-control" id="bukti_pengiriman" name="bukti_pengiriman"
                            value="{{ $data->bukti_pengiriman }}">
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" autocomplete="name"
                            value="{{ $data->no_telp }}"required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                            value="{{ $data->email }}"required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
