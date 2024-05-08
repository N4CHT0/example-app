@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nik">NIK : </label>
                    <span class="detail-value" id="nik">{{ $data->nik }}</span>
                </div>

                <div class="form-group">
                    <label for="seafare_code">Seafare Code : </label>
                    <span class="detail-value" id="seafare_code">{{ $data->seafare_code }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap : </label>
                    <span class="detail-value" id="nama_lengkap">{{ $data->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="kewarganegaraan">Kewarganegaraan : </label>
                    <span class="detail-value" id="kewarganegaraan">{{ $data->kewarganegaraan }}</span>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin : </label>
                    <span class="detail-value" id="jenis_kelamin">{{ $data->jenis_kelamin }}</span>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat : </label>
                    <span class="detail-value" id="alamat">{{ $data->alamat }}</span>
                </div>

                <div class="form-group">
                    <label for="pekerjaan">Pekerjaan : </label>
                    <span class="detail-value" id="pekerjaan">{{ $data->pekerjaan }}</span>
                </div>

                <div class="form-group">
                    <label for="provinsi">Provinsi : </label>
                    <span class="detail-value" id="provinsi">{{ $data->provinsi }}</span>
                </div>

                <div class="form-group">
                    <label for="kabupaten_kota">Kabupaten/Kota : </label>
                    <span class="detail-value" id="kabupaten_kota">{{ $data->kabupaten_kota }}</span>
                </div>

                <div class="form-group">
                    <label for="kecamatan">Kecamatan : </label>
                    <span class="detail-value" id="kecamatan">{{ $data->kecamatan }}</span>
                </div>

                <div class="form-group">
                    <label for="kelurahan_desa">Kelurahan Desa : </label>
                    <span class="detail-value" id="kelurahan_desa">{{ $data->kelurahan_desa }}</span>
                </div>

                <div class="form-group">
                    <label for="tempat_lahir">Tempat Lahir : </label>
                    <span class="detail-value" id="tempat_lahir">{{ $data->tempat_lahir }}</span>
                </div>

                <div class="form-group">
                    <label for="tanggal_lahir">Tanggal Lahir : </label>
                    <span class="detail-value" id="tanggal_lahir">{{ $data->tanggal_lahir }}</span>
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp : </label>
                    <span class="detail-value" id="no_telp">{{ $data->no_telp }}</span>
                </div>

                <div class="form-group">
                    <label for="email">Email : </label>
                    <span class="detail-value" id="email">{{ $data->email }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_ibu_kandung">Nama Ibu Kandung : </label>
                    <span class="detail-value" id="nama_ibu_kandung">{{ $data->nama_ibu_kandung }}</span>
                </div>

                <div class="form-group">
                    <label for="foto">Foto : </label>
                    <br>
                    <img class="detail-value" id="foto" src="{{ asset('storage/img/' . $data->foto) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>
            </div>
        </div>
    </div>
@endsection
