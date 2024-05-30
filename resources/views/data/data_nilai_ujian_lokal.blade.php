@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Data Nilai Ujian Lokal</h3>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 justify-content-between">
                    <a href="{{ route('CetakData.NilaiUjianLokal') }}" class="btn btn-danger d-flex align-items-center">
                        Cetak Data
                    </a>
                    <a href="{{ route('NilaiUjianLokal.create') }}" class="btn btn-success ms-2 d-flex align-items-center">
                        Tambah Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Peserta</th>
                                <th>Nilai Teknik Radio</th>
                                <th>Nilai Service Document</th>
                                <th>Nilai Radio Regulation</th>
                                <th>Nilai Bahasa Inggris</th>
                                <th>Nilai Perjanjian Internasional</th>
                                <th>Nilai GMDSS</th>
                                <th>Nilai Radio Telephony</th>
                                <th>Nilai IBT</th>
                                <th>Nilai Morse</th>
                                <th>Nilai Pancasila</th>
                                <th>Nilai Teknik Listrik</th>
                                <th>Nilai Naveka</th>
                                <th>Nilai Praktek Service Document</th>
                                <th>Nilai Praktek Radio Telephony</th>
                                <th>Nilai Praktek Morse</th>
                                <th>Nilai Praktek GMDSS</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->pesertaUjian->Users->nama_lengkap }}</td>
                                    <td>{{ $item->teknik_radio }}</td>
                                    <td>{{ $item->service_document }}</td>
                                    <td>{{ $item->radio_regulation }}</td>
                                    <td>{{ $item->bahasa_inggris }}</td>
                                    <td>{{ $item->perjanjian_internasional }}</td>
                                    <td>{{ $item->gmdss }}</td>
                                    <td>{{ $item->radio_telephony }}</td>
                                    <td>{{ $item->ibt }}</td>
                                    <td>{{ $item->morse }}</td>
                                    <td>{{ $item->pancasila }}</td>
                                    <td>{{ $item->teknik_listrik }}</td>
                                    <td>{{ $item->naveka }}</td>
                                    <td>{{ $item->praktek_service_document }}</td>
                                    <td>{{ $item->praktek_radio_telephony }}</td>
                                    <td>{{ $item->praktek_morse }}</td>
                                    <td>{{ $item->praktek_gmdss }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/report_nilai_ujian_lokal_pdf/{{ $item->id }}"
                                                class="btn btn-dark btn-sm">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                            <a href="/nilai_ujian_lokal/show/{{ $item->id }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/nilai_ujian_lokal/edit/{{ $item->id }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('NilaiUjianLokal.destroy', $item->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
