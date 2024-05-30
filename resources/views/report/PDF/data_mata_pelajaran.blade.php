<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Mata Pelajaran</title>
</head>

<body>
    <h1>Data Mata Pelajaran</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="nama_mata_pelajaran">Nama Mata Pelajaran : </label>
                    <span class="detail-value" id="nama_mata_pelajaran">{{ $data->nama_mata_pelajaran }}</span>
                </div>

                <div class="form-group">
                    <label for="jenis_diklat">Jenis Diklat : </label>
                    <span class="detail-value" id="jenis_diklat">{{ $data->jenis_diklat }}</span>
                </div>
            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari BBU.</p>
        </div>
    </div>
</body>

</html>
