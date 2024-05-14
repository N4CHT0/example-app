@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Keuangan
                </p>
                <form action="{{ route('Keuangan.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nomor_bukti">Nomor Bukti:</label>
                        <input type="text" class="form-control" id="nomor_bukti" name="nomor_bukti"
                            value="{{ $data->nomor_bukti }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="name"
                            value="{{ $data->nama }}" required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran"
                            value="{{ $data->tanggal_pembayaran }}"">
                    </div>

                    <div class="form-group">
                        <label for="berita_pembayaran">Berita Pembayaran</label>
                        <select class="form-control" id="berita_pembayaran" name="berita_pembayaran" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Pembayaran Pendaftaran Diklat REOR"
                                {{ $data->berita_pembayaran == 'Pembayaran Perpanjangan Sertifikat REOR' ? 'selected' : '' }}>
                                Pembayaran Pendaftaran
                                Diklat REOR</option>
                            <option value="Pembayaran Pendaftaran Diklat COP"
                                {{ $data->berita_pembayaran == 'Pembayaran Pendaftaran Diklat COP' ? 'selected' : '' }}>
                                Pembayaran Pendaftaran
                                Diklat COP</option>
                            <option value="Pembayaran Pendaftaran Diklat GMDSS"
                                {{ $data->berita_pembayaran == 'Pembayaran Perpanjangan Sertifikat GMDSS' ? 'selected' : '' }}>
                                Pembayaran Pendaftaran
                                Diklat GMDSS</option>
                            <option value="Pembayaran Pendaftaran Sertifikat MCU"
                                {{ $data->berita_pembayaran == 'Pembayaran Pendaftaran Sertifikat MCU' ? 'selected' : '' }}>
                                Pembayaran Pendaftaran
                                Sertifikat MCU
                            </option>
                            <option value="Pembayaran Perpanjangan Sertifikat GMDSS"
                                {{ $data->berita_pembayaran == 'Pembayaran Perpanjangan Sertifikat GMDSS' ? 'selected' : '' }}>
                                Pembayaran Perpanjangan
                                Sertifikat
                                GMDSS
                            </option>
                            <option value="Pembayaran Perpanjangan Sertifikat REOR"
                                {{ $data->berita_pembayaran == 'Pembayaran Perpanjangan Sertifikat REOR' ? 'selected' : '' }}>
                                Pembayaran Perpanjangan
                                Sertifikat
                                REOR
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status_pembayaran">Status Pembayaran</label>
                        <select class="form-control" id="status_pembayaran" name="status_pembayaran" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="LUNAS">LUNAS</option>
                            <option value="BELUM LUNAS">BELUM LUNAS</option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jumlah_uang">Jumlah Uang</label>
                        <input type="number" class="form-control" id="jumlah_uang" name="jumlah_uang" autocomplete="name"
                            value="{{ $data->jumlah_uang }}" required>
                    </div>

                    <div class="form-group">
                        <label for="petugas">Petugas</label>
                        <input type="text" class="form-control" id="petugas" name="petugas" autocomplete="name"
                            value="{{ $data->petugas }}"required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
