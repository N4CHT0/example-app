@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Absensi
                </p>
                <form action="{{ route('Absensi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_peserta_ujian">Nama Lengkap</label>
                        <input type="hidden" id="id_peserta_ujian" name="id_peserta_ujian"
                            value="{{ $data->id_peserta_ujian }}">
                        <input type="text" class="form-control" id="nama_lengkap"
                            value="{{ $data->pesertaUjian->Users->nama_lengkap ?? '' }}" placeholder="Cari nama lengkap"
                            autocomplete="off">
                        <div id="nama_lengkap_dropdown"></div>
                    </div>

                    <div class="form-group">
                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                            <option disabled value>Pilih Mata Pelajaran</option>
                            @foreach ($mata_pelajaran as $item)
                                <option value="{{ $item->id }}"
                                    {{ $data->id_mata_pelajaran == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <option value="Hadir" {{ $data->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Izin" {{ $data->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                            <option value="Tidak Hadir" {{ $data->status == 'Tidak Hadir' ? 'selected' : '' }}>Tidak Hadir
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="pertemuan">Pertemuan</label>
                        <select class="form-control" id="pertemuan" name="pertemuan" required>
                            <option value="1" {{ $data->pertemuan == '1' ? 'selected' : '' }}>1</option>
                            <option value="2" {{ $data->pertemuan == '2' ? 'selected' : '' }}>2</option>
                            <option value="3" {{ $data->pertemuan == '3' ? 'selected' : '' }}>3</option>
                            <option value="4" {{ $data->pertemuan == '4' ? 'selected' : '' }}>4</option>
                            <option value="5" {{ $data->pertemuan == '5' ? 'selected' : '' }}>5</option>
                            <option value="6" {{ $data->pertemuan == '6' ? 'selected' : '' }}>6</option>
                            <option value="7" {{ $data->pertemuan == '7' ? 'selected' : '' }}>7</option>
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
