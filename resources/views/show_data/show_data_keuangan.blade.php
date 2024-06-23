@extends('layouts.main')

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                @php
                    $totalData = $dataKeuangan->count();
                    $tanggalPembayaran = $statusPembayaran = $beritaPembayaran = '';
                @endphp

                @foreach ($dataKeuangan as $data)
                    @if ($data->data_pembayaran === 'bukti_bayar' || $data->data_pembayaran === 'tagihan')
                        @php
                            if ($data->data_pembayaran === 'bukti_bayar' && empty($tanggalPembayaran)) {
                                $tanggalPembayaran = $data->tanggal_pembayaran;
                                $statusPembayaran = $data->status_pembayaran;
                                $beritaPembayaran = $data->berita_pembayaran;
                            } elseif ($data->data_pembayaran === 'tagihan') {
                                $tanggalPembayaran .= empty($tanggalPembayaran)
                                    ? $data->tanggal_pembayaran
                                    : ', ' . $data->tanggal_pembayaran;
                                $statusPembayaran .= empty($statusPembayaran)
                                    ? $data->status_pembayaran
                                    : ', ' . $data->status_pembayaran;
                                $beritaPembayaran .= empty($beritaPembayaran)
                                    ? $data->berita_pembayaran
                                    : ', ' . $data->berita_pembayaran;
                            }
                        @endphp
                    @endif
                @endforeach


                <!-- Inisialisasi variabel yang lain -->
                @php
                    $nomorBukti = $nomorTagihan = $totalTagihan = $jumlahUang = $petugas = '';
                    $namaLengkap = $dataKeuangan->first()->user->nama_lengkap ?? '';
                @endphp

                @foreach ($dataKeuangan as $data)
                    @php
                        $nomorBukti .= empty($nomorBukti) ? $data->nomor_bukti : ', ' . $data->nomor_bukti;
                        $nomorTagihan .= empty($nomorTagihan) ? $data->nomor_tagihan : ', ' . $data->nomor_tagihan;
                        $totalTagihan .= empty($totalTagihan) ? $data->total_tagihan : ', ' . $data->total_tagihan;
                        $jumlahUang .= empty($jumlahUang) ? $data->jumlah_uang : ', ' . $data->jumlah_uang;
                        $petugas .= empty($petugas) ? $data->petugas : ', ' . $data->petugas;
                    @endphp
                @endforeach

                <div class="form-group">
                    <label for="tanggal_pembayaran">Tanggal Pembayaran : </label>
                    <span class="detail-value" id="tanggal_pembayaran">{{ $tanggalPembayaran }}</span>
                </div>

                <div class="form-group">
                    <label for="status_pembayaran"> Status Pembayaran: </label>
                    <span class="detail-value" id="status_pembayaran">{{ $statusPembayaran }}</span>
                </div>

                <div class="form-group">
                    <label for="berita_pembayaran"> Berita Pembayaran: </label>
                    <span class="detail-value" id="berita_pembayaran">{{ $beritaPembayaran }}</span>
                </div>

                <!-- Tampilkan variabel-variabel yang lain -->
                <div class="form-group">
                    <label for="nomor_bukti">Nomor Bukti : </label>
                    <span class="detail-value" id="nomor_bukti">{{ $nomorBukti }}</span>
                </div>

                <div class="form-group">
                    <label for="nomor_tagihan">Nomor Tagihan : </label>
                    <span class="detail-value" id="nomor_tagihan">{{ $nomorTagihan }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap : </label>
                    <span class="detail-value" id="nama_lengkap">{{ $namaLengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="total_tagihan"> Tagihan: </label>
                    <span class="detail-value" id="total_tagihan">{{ $totalTagihan }}</span>
                </div>

                <div class="form-group">
                    <label for="jumlah_uang">Jumlah Uang : </label>
                    <span class="detail-value" id="jumlah_uang">{{ $jumlahUang }}</span>
                </div>

                <div class="form-group">
                    <label for="petugas">Petugas : </label>
                    <span class="detail-value" id="petugas">{{ $petugas }}</span>
                </div>

                <div class="form-group">
                    <label for="bukti_pembayaran">Bukti Pembayaran : </label>
                    <br>
                    <img class="detail-value" id="bukti_pembayaran"
                        src="{{ asset('storage/img/' . $data->user->bukti_pembayaran) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <br>
                @if (in_array(auth()->user()->jenis_akun, ['super_admin', 'admin']))
                    @if ($dataKeuangan->first()->user->status_akun !== 'tervalidasi')
                        <div class="card mt-3">
                            <div class="card-header bg-info text-white">
                                Pemberitahuan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form id="validasiForm"
                                        action="{{ route('Keuangan.ValidasiAkun', ['id' => $data->id]) }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#validasiModal">
                                            Validasi Akun
                                        </button>
                                    </form>
                                    <form id="tolakValidasiForm"
                                        action="{{ route('Keuangan.TolakValidasi', ['id' => $data->id]) }}" method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#tolakValidasiModal">
                                            Tolak Validasi
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Validasi -->
                        <div class="modal fade" id="validasiModal" tabindex="-1" aria-labelledby="validasiModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="validasiModalLabel">Konfirmasi Validasi Akun</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin Untuk Menvalidasi Akun Ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary"
                                            onclick="document.getElementById('validasiForm').submit();">Ya,
                                            Validasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Tolak Validasi -->
                        <div class="modal fade" id="tolakValidasiModal" tabindex="-1"
                            aria-labelledby="tolakValidasiModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tolakValidasiModalLabel">Konfirmasi Tolak Validasi Akun
                                        </h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin Untuk Menolak Validasi Akun Ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="document.getElementById('tolakValidasiForm').submit();">Ya, Tolak
                                            Validasi</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif ($dataKeuangan->first()->user->status_transaksi === 'sedang_diproses')
                        <div class="card mt-3">
                            <div class="card-header bg-info text-white">
                                Pemberitahuan
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <form id="terimaPembayaranForm"
                                        action="{{ route('Keuangan.TerimaPembayaran', ['id' => $data->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#terimaPembayaranModal">
                                            Terima Pembayaran
                                        </button>
                                    </form>
                                    <form id="tolakPembayaranForm"
                                        action="{{ route('Keuangan.TolakPembayaran', ['id' => $data->id]) }}"
                                        method="POST">
                                        @csrf
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#tolakPembayaranModal">
                                            Tolak Pembayaran
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Terima Pembayaran -->
                        <div class="modal fade" id="terimaPembayaranModal" tabindex="-1"
                            aria-labelledby="terimaPembayaranModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="terimaPembayaranModalLabel">Konfirmasi Terima
                                            Pembayaran</h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin Untuk Menerima Pembayaran Ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-primary"
                                            onclick="document.getElementById('terimaPembayaranForm').submit();">Ya,
                                            Terima</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal Tolak Pembayaran -->
                        <div class="modal fade" id="tolakPembayaranModal" tabindex="-1"
                            aria-labelledby="tolakPembayaranModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tolakPembayaranModalLabel">Konfirmasi Tolak Pembayaran
                                        </h5>
                                        <button type="button" class="btn-close" data-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Apakah Anda Yakin Untuk Menolak Pembayaran Ini?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="document.getElementById('tolakPembayaranForm').submit();">Ya,
                                            Tolak</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="card mt-3">
                            <div class="card-header bg-success text-white">
                                Pemberitahuan
                            </div>
                            <div class="card-body">
                                <p>Pengguna Berhasil Di Validasi Dan Resmi Menjadi Siswa Bharuna Bhakti Utama</p>
                            </div>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection
