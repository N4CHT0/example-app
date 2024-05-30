<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Jadwal</title>
</head>

<body>
    <h1>Data Jadwal</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nama_mata_pelajaran"> Mata Pelajaran : </label>
                    <span class="detail-value"
                        id="nama_mata_pelajaran">{{ $data->MataPelajaran->nama_mata_pelajaran }}</span>
                </div>

                <div class="form-group">
                    <label for="nama_pengajar"> Pengajar : </label>
                    <span class="detail-value" id="nama_pengajar">{{ $data->Pengajar->nama_pengajar }}</span>
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal : </label>
                    <span class="detail-value" id="tanggal">{{ $data->tanggal }}</span>
                </div>

                <div class="form-group">
                    <label for="nomor_urut_peserta">Nomor Urut Peserta : </label>
                    <span class="detail-value" id="nomor_urut_peserta">{{ $data->nomor_urut_peserta }}</span>
                </div>

                <div class="form-group">
                    <label for="hari">Hari : </label>
                    <span class="detail-value" id="hari">{{ $data->hari }}</span>
                </div>

                <div class="form-group">
                    <label for="jam">Jam : </label>
                    <span class="detail-value" id="jam">{{ $data->jam }}</span>
                </div>

            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari BBU.</p>
        </div>
    </div>
</body>

</html>
