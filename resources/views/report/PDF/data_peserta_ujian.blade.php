<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Peserta Ujian</title>
</head>

<body>
    <h1>KARTU TANDA PESERTA UJIAN LOKAL</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="id_user">Nama : </label>
                    <span class="detail-value" id="id_user">{{ $data->Users->nama_lengkap }}</span>
                </div>

                <div class="form-group">
                    <label for="nomor_peserta_ujian"> Nomor Peserta Ujian : </label>
                    <span class="detail-value" id="nomor_peserta_ujian">{{ $data->nomor_peserta_ujian }}</span>
                </div>

                <div class="form-group">
                    <label for="angkatan"> Angkatan : </label>
                    <span class="detail-value" id="angkatan">{{ $data->angkatan }}</span>
                </div>
            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari BBU.</p>
        </div>
    </div>
</body>

</html>
