@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Data Absensi</h3>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 justify-content-between">
                    <a href="{{ route('Absensi.create') }}" class="btn btn-success ms-2 d-flex align-items-center">
                        Tambah Data
                    </a>
                </div>
                <form method="GET" action="{{ route('Absensi.index') }}" class="mb-4">
                    <div class="form-row">
                        <div class="form-group col-md-2">
                            <label for="nama_lengkap">Nama Lengkap</label>
                            <select id="nama_lengkap" name="nama_lengkap" class="form-control">
                                <option value="">Semua</option>
                                @foreach ($namaLengkapList as $namaLengkap)
                                    <option value="{{ $namaLengkap }}"
                                        {{ request('nama_lengkap') == $namaLengkap ? 'selected' : '' }}>{{ $namaLengkap }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="jenis_diklat">Jenis Diklat</label>
                            <select id="jenis_diklat" name="jenis_diklat" class="form-control">
                                <option value="">Semua</option>
                                @foreach ($jenisDiklatList as $jenisDiklat)
                                    <option value="{{ $jenisDiklat }}"
                                        {{ request('jenis_diklat') == $jenisDiklat ? 'selected' : '' }}>{{ $jenisDiklat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="pertemuan">Pertemuan</label>
                            <select id="pertemuan" name="pertemuan" class="form-control">
                                <option value="">Semua</option>
                                @foreach ($pertemuanList as $pertemuan)
                                    <option value="{{ $pertemuan }}"
                                        {{ request('pertemuan') == $pertemuan ? 'selected' : '' }}>{{ $pertemuan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="status">Status</label>
                            <select id="status" name="status" class="form-control">
                                <option value="">Semua</option>
                                @foreach ($statusList as $status)
                                    <option value="{{ $status }}"
                                        {{ request('status') == $status ? 'selected' : '' }}>{{ $status }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="mata_pelajaran">Mata Pelajaran</label>
                            <select id="mata_pelajaran" name="mata_pelajaran" class="form-control">
                                <option value="">Semua</option>
                                @foreach ($mataPelajaranList as $mataPelajaran)
                                    <option value="{{ $mataPelajaran }}"
                                        {{ request('mata_pelajaran') == $mataPelajaran ? 'selected' : '' }}>
                                        {{ $mataPelajaran }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route('CetakData.Absensi', request()->query()) }}" class="btn btn-success">Export to
                        Excel</a>
                </form>

                <!-- Data Table -->
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta Ujian</th>
                                <th>Jenis Diklat</th>
                                <th>Mata Pelajaran</th>
                                <th>Status</th>
                                <th>Pertemuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->pesertaUjian->Users->nama_lengkap }}</td>
                                    <td>{{ $item->pesertaUjian->Users->jenis_diklat }}</td>
                                    <td>{{ $item->MataPelajaran->nama_mata_pelajaran }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->pertemuan }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="/report_absensi_siswa_pdf/{{ $item->id }}"
                                                class="btn btn-dark btn-sm">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                            <a href="/absensi_siswa/show/{{ $item->id }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="/absensi_siswa/edit/{{ $item->id }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('Absensi.destroy', $item->id) }}" method="POST">
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
