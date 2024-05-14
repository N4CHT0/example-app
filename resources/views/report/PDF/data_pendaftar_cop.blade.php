<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Pendaftar Diklat COP</title>
</head>

<body>
    <h1>Data Pendaftar Diklat COP</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="seafare_code">Seafare Code : </label>
                    <span class="detail-value" id="seafare_code">{{ $data->seafare_code }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap : </label>
                    <span class="detail-value" id="nama_lengkap">{{ $data->nama_lengkap }}</span>
                </div>


                <div class="form-group">
                    <label for="jenis_sertifikat_cop">Jenis Sertifikat COP : </label>
                    <span class="detail-value" id="jenis_sertifikat_cop">{{ $data->jenis_sertifikat_cop }}</span>
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
                    <label for="kelurahan_desa">Kelurahan/Desa : </label>
                    <span class="detail-value" id="kelurahan_desa">{{ $data->kelurahan_desa }}</span>
                </div>

                <div class="form-group">
                    <label for="rt_rw">RT/RW : </label>
                    <span class="detail-value" id="rt_rw">{{ $data->rt_rw }}</span>
                </div>

                <div class="form-group">
                    <label for="kode_pos">Kode Pos : </label>
                    <span class="detail-value" id="kode_pos">{{ $data->kode_pos }}</span>
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
                    <label for="status">Status : </label>
                    <span class="detail-value" id="status">{{ $data->status }}</span>
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
                    <label for="nama_ayah">Nama Ayah : </label>
                    <span class="detail-value" id="nama_ayah">{{ $data->nama_ayah }}</span>
                </div>

                <div class="form-group">
                    <label for="foto">Foto : </label>
                    <br>
                    <img class="detail-value" id="foto" src="{{ storage_path('app/public/img/' . $data->foto) }}"
                        alt="Foto" style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin : </label>
                    <span class="detail-value" id="jenis_kelamin">{{ $data->jenis_kelamin }}</span>
                </div>
            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari BBU.</p>
        </div>
    </div>
</body>

</html>
