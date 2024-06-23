@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Absensi
                </p>
                <form action="{{ route('Absensi.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id_peserta_ujian">Nama Lengkap</label>
                        <input type="hidden" id="id_peserta_ujian" name="id_peserta_ujian">
                        <input type="text" class="form-control" id="nama_lengkap" placeholder="Cari nama lengkap"
                            autocomplete="off">
                        <div id="nama_lengkap_dropdown"></div>
                    </div>

                    <div class="form-group">
                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                            <option disabled value>Pilih Mata Pelajaran</option>
                            @foreach ($mata_pelajaran as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_mata_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Hadir">Hadir</option>
                            <option value="Izin">Izin</option>
                            <option value="Alpha">Alpha</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pertemuan">Pertemuan</label>
                        <select class="form-control" id="pertemuan" name="pertemuan" required>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#nama_lengkap').on('input', function() {
                var searchKeyword = $(this).val();
                if (searchKeyword.length >= 2) {
                    $.ajax({
                        url: "{{ route('Absensi.get') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            name: searchKeyword,
                            "_token": "{{ csrf_token() }}",
                        },
                        success: function(data) {
                            var dropdown = $('#nama_lengkap_dropdown');
                            dropdown.empty();
                            if (data.length > 0) {
                                $.each(data, function(key, value) {
                                    dropdown.append(
                                        '<a class="dropdown-item" href="#" data-id="' +
                                        value.id + '">' + value.nama_lengkap +
                                        '</a>');
                                });
                                dropdown.show();
                            } else {
                                dropdown.hide();
                            }
                        }
                    });
                } else {
                    $('#nama_lengkap_dropdown').hide();
                }
            });

            $(document).on('click', '#nama_lengkap_dropdown .dropdown-item', function(e) {
                e.preventDefault();
                var userId = $(this).data('id');
                var userName = $(this).text();
                $('#id_peserta_ujian').val(userId);
                $('#nama_lengkap').val(userName);
                $('#nama_lengkap_dropdown').hide();
            });
        });
    </script>
@endsection
