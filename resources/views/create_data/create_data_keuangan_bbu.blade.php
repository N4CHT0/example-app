@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Keuangan
                </p>
                <form action="{{ route('Keuangan.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="nomor_bukti">Nomor Bukti:</label>
                        <input type="text" class="form-control" id="nomor_bukti" name="nomor_bukti"
                            value="{{ $nomor_bukti }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" autocomplete="name"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
                        <input type="date" class="form-control" id="tanggal_pembayaran" name="tanggal_pembayaran"
                            value="{{ old('tanggal_pembayaran') }}">
                        @error('tanggal_pembayaran')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="berita_pembayaran">Berita Pembayaran</label>
                        <select class="form-control" id="berita_pembayaran" name="berita_pembayaran" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="Pembayaran Pendaftaran Diklat REOR">Pembayaran Pendaftaran Diklat REOR</option>
                            <option value="Pembayaran Pendaftaran Diklat COP">Pembayaran Pendaftaran Diklat COP</option>
                            <option value="Pembayaran Pendaftaran Diklat GMDSS">Pembayaran Pendaftaran Diklat GMDSS</option>
                            <option value="Pembayaran Pendaftaran Sertifikat MCU">Pembayaran Pendaftaran Sertifikat MCU
                            </option>
                            <option value="Pembayaran Perpanjangan Sertifikat GMDSS">Pembayaran Perpanjangan Sertifikat
                                GMDSS
                            </option>
                            <option value="Pembayaran Perpanjangan Sertifikat REOR">Pembayaran Perpanjangan Sertifikat
                                REOR
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="Petugas">Status Pembayaran</label>
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
                            required>
                    </div>

                    <div class="form-group">
                        <label for="Petugas">Petugas</label>
                        <input type="text" class="form-control" id="petugas" name="petugas" autocomplete="name"
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
