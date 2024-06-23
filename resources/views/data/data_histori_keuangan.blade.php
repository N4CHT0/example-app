@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <form method="GET" action="{{ route('Peserta.Keuangan') }}" class="mb-4">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="pertemuan">Pertemuan</label>
                            <select id="pertemuan" name="pertemuan" class="form-control">
                                <option value="">Semua</option>
                                @foreach ($keuanganList as $keuangan)
                                    <option value="{{ $keuangan }}"
                                        {{ request('keuangan') == $keuangan ? 'selected' : '' }}>{{ $keuangan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('CetakData.Absensi', request()->query()) }}" class="btn btn-success">Export to
                        Excel</a>
                </form>

                <!-- Data Table -->
                <table id="example" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Berita Pembayaran</th>
                            <th>Jenis Bukti Transaksi</th>
                            <th>Waktu Transaksi</th>
                            <th>Status Pembayaran</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $no = 1 @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    @if ($item->data_pembayaran === 'tagihan')
                                        {{ $item->nomor_tagihan }}
                                    @elseif ($item->data_pembayaran === 'bukti_bayar')
                                        {{ $item->nomor_bukti }}
                                    @endif
                                </td>
                                <td>{{ $item->berita_pembayaran }}</td>
                                <td>{{ $item->data_pembayaran }}</td>
                                <td>
                                    @if ($item->data_pembayaran === 'tagihan')
                                        {{ $item->periode_pembayaran }}
                                    @elseif ($item->data_pembayaran === 'bukti_bayar')
                                        {{ $item->tanggal_pembayaran }}
                                    @endif
                                </td>
                                <td>{{ $item->status_pembayaran }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="/keuangan/show/{{ $item->id }}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        @if ($item->data_pembayaran === 'tagihan')
                                            <div class="btn-group">
                                                <a href="cetak-invoice/{{ $item->id }}" class="btn btn-warning btn-sm">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            </div>
                                        @elseif ($item->data_pembayaran === 'bukti_bayar')
                                            <div class="btn-group">
                                                <a href="/report_keuangan_pdf/{{ $item->id }}"
                                                    class="btn btn-danger btn-sm">
                                                    <i class="fas fa-file-pdf"></i>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
