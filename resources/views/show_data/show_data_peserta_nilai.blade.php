@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Absensi
                </p>
                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta Ujian</th>
                                <th>Teknik Radio</th>
                                <th>Service Document</th>
                                <th>Radio Regulation</th>
                                <th>Bahasa Inggris</th>
                                <th>Perjanjian Internasional</th>
                                <th>GMDSS</th>
                                <th>Radio Telephony</th>
                                <th>IBT</th>
                                <th>Morse</th>
                                <th>Pancasila</th>
                                <th>Teknik Listrik</th>
                                <th>Naveka</th>
                                <th>Praktek Service Document</th>
                                <th>Praktek Radio Telephony</th>
                                <th>Praktek Morse</th>
                                <th>Praktek GMDSS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1 @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $item->pesertaUjian->Users->nama_lengkap }}</td>
                                    <td>{{ $item->teknik_radio }}</td>
                                    <td>{{ $item->service_document }}</td>
                                    <td>{{ $item->radio_regulation }}</td>
                                    <td>{{ $item->bahasa_inggris }}</td>
                                    <td>{{ $item->perjanjian_internasional }}</td>
                                    <td>{{ $item->gmdss }}</td>
                                    <td>{{ $item->radio_telephony }}</td>
                                    <td>{{ $item->ibt }}</td>
                                    <td>{{ $item->morse }}</td>
                                    <td>{{ $item->pancasila }}</td>
                                    <td>{{ $item->teknik_listrik }}</td>
                                    <td>{{ $item->naveka }}</td>
                                    <td>{{ $item->praktek_service_document }}</td>
                                    <td>{{ $item->praktek_radio_telephony }}</td>
                                    <td>{{ $item->praktek_morse }}</td>
                                    <td>{{ $item->praktek_gmdss }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
