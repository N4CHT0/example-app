@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Data Pendaftar Sertifikat MCU</h3>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 justify-content-between">
                    <a href="{{ route('CetakData.Pendaftar_Sertifikat_MCU') }}"
                        class="btn btn-danger d-flex align-items-center">
                        Cetak Data
                    </a>
                    <a href="{{ route('pendaftaran.mcu_create') }}" class="btn btn-success ms-2 d-flex align-items-center">
                        Tambah Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama Lengkap</th>
                                <th>Jabatan Diatas Kapal</th>
                                <th>No Telp</th>
                                <th>Edit Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->nama_lengkap }}</td>
                                    <td>{{ $item->jabatan_diatas_kapal }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>{{ $item->edit_foto }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/report_pendaftar_sertifikat_mcu_pdf/{{ $item->id }}"
                                                class="btn btn-dark btn-sm">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                            <a href="data_pendaftar_sertifikat_mcu/show/{{ $item->id }}"
                                                class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/data_pendaftar_sertifikat_mcu/edit/{{ $item->id }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('DaftarMCU.destroy', $item->id) }}" method="POST">
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
