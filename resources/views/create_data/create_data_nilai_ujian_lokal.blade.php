@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Nilai Ujian Lokal
                </p>
                <form action="{{ route('NilaiUjianLokal.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id_peserta_ujian">Nama Lengkap</label>
                        <input type="hidden" id="id_peserta_ujian" name="id_peserta_ujian">
                        <input type="text" class="form-control" id="nama_lengkap" placeholder="Cari nama lengkap"
                            autocomplete="off">
                        <div id="nama_lengkap_dropdown"></div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="teknik_radio">Nilai Teknik Radio</label>
                                <input type="text" class="form-control" id="teknik_radio" name="teknik_radio">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="service_document">Nilai Service Document</label>
                                <input type="text" class="form-control" id="service_document" name="service_document">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="radio_regulation">Nilai Radio Regulation</label>
                                <input type="text" class="form-control" id="radio_regulation" name="radio_regulation">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="bahasa_inggris">Nilai Bahasa Inggris</label>
                                <input type="text" class="form-control" id="bahasa_inggris" name="bahasa_inggris">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="perjanjian_internasional">Nilai Perjanjian Internasional</label>
                                <input type="text" class="form-control" id="perjanjian_internasional"
                                    name="perjanjian_internasional">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="gmdss">Nilai GMDSS</label>
                                <input type="text" class="form-control" id="gmdss" name="gmdss">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="radio_telephony">Nilai Radio Telephony</label>
                                <input type="text" class="form-control" id="radio_telephony" name="radio_telephony">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="ibt">Nilai IBT</label>
                                <input type="text" class="form-control" id="ibt" name="ibt">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="morse">Nilai Morse</label>
                                <input type="text" class="form-control" id="morse" name="morse">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="pancasila">Nilai Pancasila</label>
                                <input type="text" class="form-control" id="pancasila" name="pancasila">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="teknik_listrik">Nilai Teknik Listrik</label>
                                <input type="text" class="form-control" id="teknik_listrik" name="teknik_listrik">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="naveka">Nilai Naveka</label>
                                <input type="text" class="form-control" id="naveka" name="naveka">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="praktek_service_document">Nilai Praktek Service Document</label>
                                <input type="text" class="form-control" id="praktek_service_document"
                                    name="praktek_service_document">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="praktek_radio_telephony">Nilai Praktek Radio Telephony</label>
                                <input type="text" class="form-control" id="praktek_radio_telephony"
                                    name="praktek_radio_telephony">
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="praktek_morse">Nilai Praktek Morse</label>
                                <input type="text" class="form-control" id="praktek_morse" name="praktek_morse">
                            </div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <label for="praktek_gmdss">Nilai Praktek GMDSS</label>
                                <input type="text" class="form-control" id="praktek_gmdss" name="praktek_gmdss">
                            </div>
                        </div>
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
                        url: "{{ route('NilaiUjianLokal.get') }}",
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
