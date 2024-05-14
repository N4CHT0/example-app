@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Inventory Sertifikat BBU
                </p>
                <form action="{{ route('Inventory.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="jenis_sertifikat">Jenis Sertifikat:</label>
                        <input type="text" class="form-control" id="jenis_sertifikat" name="jenis_sertifikat" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_pemilik">Nama Pemilik</label>
                        <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" autocomplete="name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="no_sertifikat">No Sertifikat</label>
                        <input type="number" class="form-control" id="no_sertifikat" name="no_sertifikat" required>
                    </div>

                    <div class="form-group">
                        <label for="status_sertifikat">Status Sertifikat</label>
                        <select class="form-control" id="status_sertifikat" name="status_sertifikat" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Tersedia">Tersedia</option>
                            <option value="Sudah Diterima">Sudah Diterima</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="foto_sertifikat">Upload Foto Sertifikat</label>
                        <input type="file" class="form-control" id="foto_sertifikat" name="foto_sertifikat" required>
                    </div>

                    <div class="form-group">
                        <label for="bukti_pengambilan">Upload Bukti Pengambilan</label>
                        <input type="file" class="form-control" id="bukti_pengambilan" name="bukti_pengambilan">
                    </div>
                    <div class="form-group">
                        <label for="bukti_pengiriman">Upload Bukti Pengiriman</label>
                        <input type="file" class="form-control" id="bukti_pengiriman" name="bukti_pengiriman">
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="number" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" autocomplete="email"
                            required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
