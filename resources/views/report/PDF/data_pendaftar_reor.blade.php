<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Pendaftar Diklat REOR</title>
</head>

<body>
    <h1>Data Pendaftar Diklat REOR</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nik">NIK : </label>
                    <span class="detail-value" id="nik">{{ $data->nik }}</span>
                </div>

                <div class="form-group">
                    <label for="npwp">NPWP : </label>
                    <span class="detail-value" id="npwp">{{ $data->npwp }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap : </label>
                    <span class="detail-value" id="nama_lengkap">{{ $data->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="status">Status : </label>
                    <span class="detail-value" id="status">{{ $data->status }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_instansi">Nama Instansi : </label>
                    <span class="detail-value" id="nama_instansi">{{ $data->nama_instansi }}</span>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat : </label>
                    <span class="detail-value" id="alamat">{{ $data->alamat }}</span>
                </div>

                <div class="form-group">
                    <label for="agama">Agama : </label>
                    <span class="detail-value" id="agama">{{ $data->agama }}</span>
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
                    <label for="nama_ibu">Nama Ibu : </label>
                    <span class="detail-value" id="nama_ibu">{{ $data->nama_ibu }}</span>
                </div>

                <div class="form-group">
                    <label for="pekerjaan_ibu">Pekerjaan Ibu : </label>
                    <span class="detail-value" id="pekerjaan_ibu">{{ $data->pekerjaan_ibu }}</span>
                </div>

                <div class="form-group">
                    <label for="penghasilan">Penghasilan Ibu : </label>
                    <span class="detail-value" id="penghasilan_ibu">{{ $data->penghasilan_ibu }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_ayah">Nama Ayah : </label>
                    <span class="detail-value" id="nama_ayah">{{ $data->nama_ayah }}</span>
                </div>

                <div class="form-group">
                    <label for="pekerjaaan_ayah">Pekerjaan Ayah : </label>
                    <span class="detail-value" id="pekerjaan_ayah">{{ $data->pekerjaan_ayah }}</span>
                </div>

                <div class="form-group">
                    <label for="penghasilan_ayah">Penghasilan Ayah : </label>
                    <span class="detail-value" id="penghasilan_ayah">{{ $data->penghasilan_ayah }}</span>
                </div>
                <div class="form-group">
                    <label for="foto">Foto : </label>
                    <br>
                    <img class="detail-value" id="foto" src="{{ storage_path('app/public/img/' . $data->foto) }}"
                        alt="Foto" style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_ktp">Scan/Foto KTP : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_ktp"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_ktp) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_npwp">Scan/Foto NPWP : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_npwp"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_npwp) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_akte">Scan/Foto Akte Kelahiran : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_akte"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_akte) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_ijazah_terakhir">Scan/Foto Ijazah Terakhir : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_ijazah_terakhir"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_ijazah_terakhir) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari BBU.</p>
        </div>
    </div>
</body>

</html>
