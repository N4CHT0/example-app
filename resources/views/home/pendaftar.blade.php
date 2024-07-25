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
                        <div class="card">
                            <div class="card-body">
                                <img class="detail-value" id="foto_sertifikat"
                                    src="{{ asset('storage/img/' . Auth::user()->foto) }}" alt="Foto"
                                    style="max-width: 380px; height: 380px;">
                            </div>
                        </div>
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
                                    <span class="detail-value" id="nama2">{{ Auth::user()->id }}</span>
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
                                    <span class="detail-value" id="nama2">{{ Auth::user()->agama }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">Email:</label>
                                    <span class="detail-value" id="nama2">{{ Auth::user()->email }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">No Telp:</label>
                                    <span class="detail-value" id="nama2">{{ Auth::user()->no_telp }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="nama2">Alamat:</label>
                                    <span class="detail-value" id="nama2">{{ Auth::user()->alamat }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (auth()->user()->status_akun == 'proses_validasi')
            <div class="card">
                <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                    <span style="color: white; font-size: 20px;">Pemberitahuan Sistem</span>
                    <a href="{{ route('Cetak.Invoice') }}" class="btn btn-primary d-flex align-items-center ml-auto"
                        style="color: white;">
                        <i class="fas fa-edit" style="margin-right: 5px;"></i> Cetak Invoice
                    </a>
                </div>
                <div class="card-body">
                    <div class="col-md-15">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <label style="color: black; font-weight: 500">Harap Menunggu Proses Validasi, Setelah
                                        Proses Validasi Maka Fitur Pada Aplikasi
                                        Akan Dibuka Sepenuhnya</label>
                                </div>
                                <br>
                                <div>
                                    <label style="color: black; font-weight: 500">Jika Terdapat Masalah Maka Hubungi
                                        Admin Di Kontak Berikut Ini</label>
                                </div>
                                <div>
                                    <a href="https://wa.me/6282131042820" class="btn btn-success mt-3" target="_blank">
                                        <i class="fab fa-whatsapp"></i> Hubungi Admin
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @elseif ($user->pendaftaran)
            <div class="card">
                <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                    <span style="color: white; font-size: 20px;">Pemberitahuan Sistem</span>
                    <a href="{{ route('Cetak.Invoice') }}" class="btn btn-primary d-flex align-items-center ml-auto"
                        style="color: white;">
                        <i class="fas fa-edit" style="margin-right: 5px;"></i> Cetak Invoice
                    </a>
                </div>
                <div class="card-body">
                    <div class="col-md-15">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <label>Harap Segera Mengupload Bukti Pembayaran Sesuai Dengan Tagihan, Agar Akun Anda
                                        Dapat Segera Di Validasi Oleh Admin</label>
                                    <br><br>
                                    <form action="{{ route('Upload.Bukti') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" class="form-control" id="bukti_pembayaran"
                                                name="bukti_pembayaran" accept="image/*" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Upload</button>
                                    </form>

                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="card">
                <div class="card-header bg-secondary d-flex justify-content-between align-items-center">
                    <span style="color: white; font-size: 20px;">Pemberitahuan Sistem</span>
                </div>
                <div class="card-body">
                    <div class="col-md-15">
                        <div class="card">
                            <div class="card-body">
                                <div>
                                    <span>Harap Segera Mengisi Form Pendaftaran Sesuai Dengan Diklat Yang Di Inginkan</span>
                                    <br>
                                    <br>
                                    <a href="{{ route('Pendaftar.Diklat') }}" class="btn btn-success">Daftar Sekarang</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
