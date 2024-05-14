@extends('pendaftaran.layout_daftar')
@section('content')
    <p>
        Pendaftaran Diklat COP
    </p>

    <form action="{{ route('DaftarCOP.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="jenis_sertifikat_cop">Jenis Sertifikat COP</label>
            <select class="form-control" id="jenis_sertifikat_cop" name="jenis_sertifikat_cop" required>
                <!-- Pilihan role sesuai dengan kebutuhan -->
                <option value="MC">MC</option>
                <option value="MFA">MFA</option>
                <option value="SSO">SSO</option>
                <option value="SAT">SAT</option>
                <option value="SAT">SATSDSD</option>
                <!-- Tambahkan pilihan lain jika diperlukan -->
            </select>
        </div>

        <div class="form-group">
            <label for="seafare_code">Seafare Code</label>
            <input type="text" class="form-control" id="seafare_code" name="seafare_code" required>
        </div>

        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" autocomplete="name" required>
        </div>

        <div class="form-group">
            <label for="tempat_lahir">Tempat Lahir</label>
            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
        </div>

        <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input type="number" class="form-control" id="no_telp" name="no_telp" autocomplete="tel" required>
        </div>

        <div class="form-group">
            <label for="alamat">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" autocomplete="street-address" required>
        </div>

        <div class="form-group">
            <label for="agama">Agama</label>
            <input type="text" class="form-control" id="agama" name="agama" required>
        </div>

        <div class="form-group">
            <label for="provinsi">Provinsi</label>
            <input type="text" class="form-control" id="provinsi" name="provinsi" required>
        </div>

        <div class="form-group">
            <label for="kecamatan">Kecamatan</label>
            <input type="text" class="form-control" id="kecamatan" name="kecamatan" required>
        </div>

        <div class="form-group">
            <label for="kabupaten_kota">Kabupaten/Kota</label>
            <input type="text" class="form-control" id="kabupaten_kota" name="kabupaten_kota" required>
        </div>

        <div class="form-group">
            <label for="kelurahan_desa">Kelurahan/Desa</label>
            <input type="text" class="form-control" id="kelurahan_desa" name="kelurahan_desa" required>
        </div>

        <div class="form-group">
            <label for="rt_rw">RT/RW</label>
            <input type="text" class="form-control" id="rt_rw" name="rt_rw" required>
        </div>

        <div class="form-group">
            <label for="kode_pos">Kode Pos</label>
            <input type="text" class="form-control" id="kode_pos" name="kode_pos" required>
        </div>

        <div class="form-group">
            <label for="pekerjaan">Pekerjaan</label>
            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" class="form-control" id="status" name="status" required>
        </div>

        <div class="form-group">
            <label for="nama_ibu">Nama Ibu</label>
            <input type="text" class="form-control" id="nama_ibu" name="nama_ibu" required>
        </div>

        <div class="form-group">
            <label for="nama_ayah">Nama Ayah</label>
            <input type="text" class="form-control" id="nama_ayah" name="nama_ayah" required>
        </div>

        <div class="form-group">
            <label for="foto">Upload Foto</label>
            <input type="file" class="form-control" id="foto" name="foto" accept="image/*" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" autocomplete="email" required>
        </div>

        <div class="form-group">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                <!-- Pilihan role sesuai dengan kebutuhan -->
                <option value="Laki - Laki">Laki - Laki</option>
                <option value="Perempuan">Perempuan</option>
                <!-- Tambahkan pilihan lain jika diperlukan -->
            </select>
        </div>
        <br>
        <div>
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>
@endsection
