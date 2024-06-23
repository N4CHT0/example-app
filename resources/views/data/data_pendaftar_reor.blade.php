@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Data Pendaftar Diklat REOR</h3>
            </div>

            <div class="card-body">
                <div class="btn-group mb-3 justify-content-between">
                    <a href="{{ route('CetakData.Pendaftar_Diklat_REOR') }}" class="btn btn-danger d-flex align-items-center">
                        Cetak Data
                    </a>
                    <a href="{{ route('pendaftaran.cop_create') }}" class="btn btn-success ms-2 d-flex align-items-center">
                        Tambah Data
                    </a>
                </div>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Pilihan Diklat</th>
                                <th>Periode Ujian Negara</th>
                                <th>NIK</th>
                                <th>NPWP</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Kelamin</th>
                                <th>Edit Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('DaftarREOR.index') !!}',
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'pilihan_diklat',
                        name: 'pilihan_diklat'
                    },
                    {
                        data: 'periode_ujian_negara',
                        name: 'periode_ujian_negara'
                    },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'npwp',
                        name: 'npwp'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'edit_foto',
                        name: 'edit_foto'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false,
                        searchable: false
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    targets: 0,
                    render: function(data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    }
                }]
            });
        });
    </script>
@endsection
