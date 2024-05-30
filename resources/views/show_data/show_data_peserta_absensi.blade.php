@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <form method="GET" action="{{ route('Peserta.Absensi') }}" class="mb-4">
                    <div class="form-row">
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
                                @foreach ($mataPelajaranList as $id => $mataPelajaran)
                                    <option value="{{ $id }}"
                                        {{ request('mata_pelajaran') == $id ? 'selected' : '' }}>{{ $mataPelajaran }}
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
                                <td>{{ $item->mataPelajaran->nama_mata_pelajaran }}</td>
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
                                        <a href="/absensi_siswa/edit/{{ $item->id }}" class="btn btn-warning btn-sm">
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
@endsection
