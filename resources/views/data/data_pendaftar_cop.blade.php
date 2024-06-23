@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Data Pendaftar Diklat COP</h3>
            </div>
            <div class="card-body">
                <div class="btn-group mb-3 justify-content-between">
                    <a href="{{ route('CetakData.Pendaftar_Diklat_COP') }}" class="btn btn-danger d-flex align-items-center">
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
                                <th>Seafare Code</th>
                                <th>Nama Lengkap</th>
                                <th>Jenis Sertifikat COP</th>
                                <th>Jenis Kelamin</th>
                                <th>Email</th>
                                <th>No Telp</th>
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
                ajax: '{!! route('DaftarCOP.index') !!}',
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
                        data: 'seafare_code',
                        name: 'seafare_code'
                    },
                    {
                        data: 'nama_lengkap',
                        name: 'nama_lengkap'
                    },
                    {
                        data: 'jenis_sertifikat_cop',
                        name: 'jenis_sertifikat_cop'
                    },
                    {
                        data: 'jenis_kelamin',
                        name: 'jenis_kelamin'
                    },
                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'no_telp',
                        name: 'no_telp'
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
