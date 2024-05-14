<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Pendaftar Sertifikat MCU</title>
</head>

<body>
    <h1>Data Pendaftar Sertifikat MCU</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap : </label>
                    <span class="detail-value" id="nama_lengkap">{{ $data->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="jabatan_diatas_kapal">Jabatan Diatas Kapal : </label>
                    <span class="detail-value" id="jabatan_diatas_kapal">{{ $data->jabatan_diatas_kapal }}</span>
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp : </label>
                    <span class="detail-value" id="no_telp">{{ $data->no_telp }}</span>
                </div>

                <div class="form-group">
                    <label for="foto">Foto : </label>
                    <br>
                    <img class="detail-value" id="foto" src="{{ storage_path('app/public/img/' . $data->foto) }}"
                        alt="Foto" style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="foto_ktp">Foto KTP : </label>
                    <br>
                    <img class="detail-value" id="foto_ktp"
                        src="{{ storage_path('app/public/img/' . $data->foto_ktp) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="foto_bst">Foto BST : </label>
                    <br>
                    <img class="detail-value" id="foto_bst"
                        src="{{ storage_path('app/public/img/' . $data->foto_bst) }}" alt="Foto"
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
