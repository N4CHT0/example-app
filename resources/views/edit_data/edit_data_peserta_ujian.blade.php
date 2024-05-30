@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Peserta Ujian
                </p>
                <form action="{{ route('PesertaUjian.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_user">Nama Lengkap</label>
                        <input type="hidden" id="id_user" name="id_user" value="{{ $data->id_user }}">
                        <input type="text" class="form-control" id="nama_lengkap"
                            value="{{ $data->Users->nama_lengkap ?? '' }}" placeholder="Cari nama lengkap"
                            autocomplete="off">
                        <div id="nama_lengkap_dropdown"></div>
                    </div>


                    <div class="form-group">
                        <label for="periode_ujian">Periode Ujian</label>
                        <select class="form-control" id="periode_ujian" name="periode_ujian" required>
                            <option value="Januari" {{ $data->periode_ujian == 'Januari' ? 'selected' : '' }}>Januari
                            </option>
                            <option value="Februari" {{ $data->periode_ujian == 'Februari' ? 'selected' : '' }}>Februari
                            </option>
                            <option value="Maret" {{ $data->periode_ujian == 'Maret' ? 'selected' : '' }}>Maret
                            </option>
                            <option value="April" {{ $data->periode_ujian == 'April' ? 'selected' : '' }}>April
                            </option>
                            <option value="Mei" {{ $data->periode_ujian == 'Mei' ? 'selected' : '' }}>Mei
                            </option>
                            <option value="Juni" {{ $data->periode_ujian == 'Juni' ? 'selected' : '' }}>Juni
                            </option>
                            <option value="Juli" {{ $data->periode_ujian == 'Juli' ? 'selected' : '' }}>Juli
                            </option>
                            <option value="Agustus" {{ $data->periode_ujian == 'Agustus' ? 'selected' : '' }}>Agustus
                            </option>
                            <option value="September" {{ $data->periode_ujian == 'September' ? 'selected' : '' }}>September
                            </option>
                            <option value="Oktober" {{ $data->periode_ujian == 'Oktober' ? 'selected' : '' }}>Oktober
                            </option>
                            <option value="November" {{ $data->periode_ujian == 'November' ? 'selected' : '' }}>November
                            </option>
                            <option value="Desember" {{ $data->periode_ujian == 'Desember' ? 'selected' : '' }}>Desember
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status_peserta">Status Peserta</label>
                        <select class="form-control" id="status_peserta" name="status_peserta" required>
                            <option value="Akan Mengikuti Ujian"
                                {{ $data->status_peserta == 'Akan Mengikuti Ujian' ? 'selected' : '' }}>Akan Mengikuti
                                Ujian
                            </option>
                            <option value="Telah Mengikuti Ujian"
                                {{ $data->status_peserta == 'Telah Mengikuti Ujian' ? 'selected' : '' }}>Telah Mengikuti
                                Ujian
                            </option>
                            <option value="Alumni" {{ $data->status_peserta == 'Alumni' ? 'selected' : '' }}>Alumni
                            </option>
                            <!-- Tambahkan pilihan lain jika diperlukan -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="nomor_peserta_ujian">Nomor Peserta Ujian</label>
                        <input type="text" class="form-control" id="nomor_peserta_ujian" name="nomor_peserta_ujian"
                            value="{{ $data->nomor_peserta_ujian }}" required>
                    </div>

                    <div class="form-group">
                        <label for="angkatan">Angkatan</label>
                        <input type="text" class="form-control" id="angkatan" name="angkatan"
                            value="{{ $data->angkatan }}" required>
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
                        url: "{{ route('PesertaUjian.get') }}",
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
                                        '<div class="dropdown-item" data-id="' +
                                        value.id + '">' + value.nama_lengkap +
                                        '</div>');
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

            $(document).on('click', '#nama_lengkap_dropdown .dropdown-item', function() {
                var userId = $(this).data('id');
                var userName = $(this).text();
                $('#id_user').val(userId);
                $('#nama_lengkap').val(userName);
                $('#nama_lengkap_dropdown').hide();
            });
        });
    </script>
@endsection
