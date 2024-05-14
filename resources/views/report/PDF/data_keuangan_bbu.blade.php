<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Data Keuangan</title>
</head>

<body>
    <img class="detail-value" id="foto" src="{{ public_path('kwitansi_keuangan/Kop atas .png') }}" alt="Foto"
        style="max-width: 300px;">
    <h1>Kuitansi Pembayaran</h1>
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <div class="form-group">
                    <label for="tanggal_pembayaran">TA : </label>
                    <span class="detail-value" id="tanggal_pembayaran">{{ $data->tanggal_pembayaran }}</span>
                </div>

                <div class="form-group">
                    <label for="nomor_bukti">Nomor Bukti : </label>
                    <span class="detail-value" id="nomor_bukti">{{ $data->nomor_bukti }}</span>
                </div>

                <div class="form-group">
                    <label for="nama">Sudah Diterima Dari : </label>
                    <span class="detail-value" id="nama">{{ $data->nama }}</span>
                </div>

                <div class="form-group">
                    <label for="jumlah_uang">Jumlah Uang : </label>
                    <span class="detail-value" id="jumlah_uang">{{ $data->jumlah_uang }}</span>
                </div>
                <div class="form-group">
                    <label for="berita_pembayaran">Untuk Pembayaran : </label>
                    <span class="detail-value" id="berita_pembayaran">{{ $data->berita_pembayaran }}</span>
                </div>
                <div class="form-group">
                    <label for="status_pembayaran">Keterangan : </label>
                    <span class="detail-value" id="status_pembayaran">{{ $data->status_pembayaran }}</span>
                </div>
                <div class="form-group">
                    <label for="petugas">Petugas : </label>
                    <span class="detail-value" id="petugas">{{ $data->petugas }}</span>
                </div>
            </div>
        </div>
        <div class="notes">
            <p>Note: Data Diambil Dari Bharuna Bakti Utama.</p>
        </div>
        <img class="detail-value" id="foto" src="{{ public_path('kwitansi_keuangan/Kop Bawah.png') }}"
            alt="Foto" style="max-width: 300px;">
</body>

</html>
