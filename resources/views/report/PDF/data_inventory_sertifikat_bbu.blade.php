<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Inventory Sertifikat BBU</title>
</head>

<body>
    <h1>Data Inventory Sertifikat BBU</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="jenis_sertifikat">Jenis Sertifikat : </label>
                    <span class="detail-value" id="jenis_sertifikat">{{ $data->jenis_sertifikat }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_pemilik">Nama Pemilik : </label>
                    <span class="detail-value" id="nama_pemilik">{{ $data->nama_pemilik }}</span>
                </div>

                <div class="form-group">
                    <label for="no_sertifikat">No Sertifikat : </label>
                    <span class="detail-value" id="no_sertifikat">{{ $data->no_sertifikat }}</span>
                </div>

                <div class="form-group">
                    <label for="status_sertifikat">Status Sertifikat : </label>
                    <span class="detail-value" id="status_sertifikat">{{ $data->status_sertifikat }}</span>
                </div>

                <div class="form-group">
                    <label for="foto_sertifikat">Foto Sertifikat : </label>
                    <br>
                    <img class="detail-value" id="foto_sertifikat"
                        src="{{ storage_path('app/public/img/' . $data->foto_sertifikat) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="bukti_pengambilan">Bukti Pengambilan : </label>
                    <br>
                    <img class="detail-value" id="bukti_pengambilan"
                        src="{{ storage_path('app/public/img/' . $data->bukti_pengambilan) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="bukti_pengiriman">Bukti Pengiriman : </label>
                    <br>
                    <img class="detail-value" id="bukti_pengiriman"
                        src="{{ storage_path('app/public/img/' . $data->bukti_pengiriman) }}" alt="Foto"
                        style="max-width: 300px;">
                </div>

                <div class="form-group">
                    <label for="no_telp">No Telp : </label>
                    <span class="detail-value" id="no_telp">{{ $data->no_telp }}</span>
                </div>

                <div class="form-group">
                    <label for="email">Email : </label>
                    <span class="detail-value" id="email">{{ $data->email }}</span>
                </div>
            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari BBU.</p>
        </div>
    </div>
</body>

</html>
