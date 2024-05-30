@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="id_user">Nama Peserta Ujian : </label>
                    <span class="detail-value" id="id_user">{{ $data->pesertaUjian->Users->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="teknik_radio">Nilai Teknik Radio : </label>
                    <span class="detail-value" id="teknik_radio">{{ $data->teknik_radio }}</span>
                </div>

                <div class="form-group">
                    <label for="service_document"> Nilai Service Document : </label>
                    <span class="detail-value" id="service_document">{{ $data->service_document }}</span>
                </div>

                <div class="form-group">
                    <label for="radio_regulation"> Nilai Radio Regulation : </label>
                    <span class="detail-value" id="radio_regulation">{{ $data->radio_regulation }}</span>
                </div>

                <div class="form-group">
                    <label for="bahasa_inggris"> Nilai Bahasa Inggris : </label>
                    <span class="detail-value" id="bahasa_inggris">{{ $data->bahasa_inggris }}</span>
                </div>

                <div class="form-group">
                    <label for="perjanjian_internasional"> Nilai Perjanjian Internasional : </label>
                    <span class="detail-value" id="perjanjian_internasional">{{ $data->perjanjian_internasional }}</span>
                </div>

                <div class="form-group">
                    <label for="gmdss"> Nilai GMDSS : </label>
                    <span class="detail-value" id="gmdss">{{ $data->gmdss }}</span>
                </div>

                <div class="form-group">
                    <label for="radio_telephony"> Nilai Radio Telephony : </label>
                    <span class="detail-value" id="radio_telephony">{{ $data->radio_telephony }}</span>
                </div>

                <div class="form-group">
                    <label for="ibt"> Nilai IBT : </label>
                    <span class="detail-value" id="ibt">{{ $data->ibt }}</span>
                </div>

                <div class="form-group">
                    <label for="morse"> Nilai Morse : </label>
                    <span class="detail-value" id="morse">{{ $data->morse }}</span>
                </div>

                <div class="form-group">
                    <label for="pancasila"> Nilai Pancasila : </label>
                    <span class="detail-value" id="pancasila">{{ $data->pancasila }}</span>
                </div>

                <div class="form-group">
                    <label for="teknik_listrik"> Nilai Teknik Listrik : </label>
                    <span class="detail-value" id="teknik_listrik">{{ $data->teknik_listrik }}</span>
                </div>

                <div class="form-group">
                    <label for="naveka"> Nilai NAVEKA : </label>
                    <span class="detail-value" id="naveka">{{ $data->naveka }}</span>
                </div>

                <div class="form-group">
                    <label for="praktek_service_document"> Nilai Praktek Service Document : </label>
                    <span class="detail-value" id="praktek_service_document">{{ $data->praktek_service_document }}</span>
                </div>

                <div class="form-group">
                    <label for="praktek_radio_telephony"> Nilai Radio Telephony : </label>
                    <span class="detail-value" id="praktek_radio_telephony">{{ $data->praktek_radio_telephony }}</span>
                </div>

                <div class="form-group">
                    <label for="praktek_morse"> Nilai Praktek Morse : </label>
                    <span class="detail-value" id="praktek_morse">{{ $data->praktek_morse }}</span>
                </div>

                <div class="form-group">
                    <label for="praktek_gmdss"> Nilai Praktek GMDSS : </label>
                    <span class="detail-value" id="praktek_gmdss">{{ $data->praktek_gmdss }}</span>
                </div>

            </div>
        </div>
    </div>
@endsection
