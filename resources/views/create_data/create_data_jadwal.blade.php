@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Buat Data Jadwal
                </p>
                <form action="{{ route('Jadwal.store') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                            <option disabled value>Pilih Mata Pelajaran</option>
                            @foreach ($mata_pelajaran as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_mata_pelajaran }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_pengajar">Nama Pengajar</label>
                        <select class="form-control" id="id_pengajar" name="id_pengajar" required>
                            <option disabled value>Pilih Pengajar</option>
                            @foreach ($pengajar as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_pengajar }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                    </div>

                    <div class="form-group">
                        <label for="nomor_urut_peserta">Nomor Urut Peserta</label>
                        <input type="text" class="form-control" id="nomor_urut_peserta" name="nomor_urut_peserta"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select class="form-control" id="hari" name="hari" required>
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jum at">Jum at</option>
                            <option value="Sabtu">Sabtu</option>
                            <option value="Minggu">Selasa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="jam">Jam</label>
                        <input type="text" class="form-control" id="jam" name="jam" required>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
