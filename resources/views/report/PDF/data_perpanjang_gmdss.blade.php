<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Pendaftar Perpanjang Sertifikat GMDSS</title>
</head>

<body>
    <h1>Data Pendaftar Perpanjang Sertifikat GMDSS</h1>
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
                    <label for="lembaga_diklat">Lembaga Diklat : </label>
                    <span class="detail-value" id="lembaga_diklat">{{ $data->lembaga_diklat }}</span>
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
                    <label for="status">Status : </label>
                    <span class="detail-value" id="status">{{ $data->status }}</span>
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
                    <label for="kode_pos">Kode Pos : </label>
                    <span class="detail-value" id="kode_pos">{{ $data->kode_pos }}</span>
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
                    <label for="nama_ayah_kandung">Nama Ayah Kandung : </label>
                    <span class="detail-value" id="nama_ayah_kandung">{{ $data->nama_ayah_kandung }}</span>
                </div>

                <div class="form-group">
                    <label for="foto">Foto : </label>
                    <br>
                    <img class="detail-value" id="foto" src="{{ storage_path('app/public/img/' . $data->foto) }}"
                        alt="Foto" style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_ijazah_laut">Scan/Foto Ijazah Laut : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_ijazah_laut"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_ijazah_laut) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_masa_layar">Scan/Foto Masa Layar : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_masa_layar"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_masa_layar) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_mcu">Scan/Foto Sertifikat MCU : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_mcu"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_mcu) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_sertifikat_bst">Scan/Foto Sertifikat BST : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_sertifikat_bst"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_sertifikat_bst) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_ktp">Scan/Foto KTP : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_ktp"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_ktp) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="scan_foto_akte">Scan/Foto Akte : </label>
                    <br>
                    <img class="detail-value" id="scan_foto_akte"
                        src="{{ storage_path('app/public/img/' . $data->scan_foto_akte) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>
            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari BBU.</p>
        </div>
</body>

</html>
