@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Jadwal
                </p>
                <form action="{{ route('Jadwal.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_mata_pelajaran">Mata Pelajaran</label>
                        <select class="form-control" id="id_mata_pelajaran" name="id_mata_pelajaran" required>
                            <option disabled value>Pilih Mata Pelajaran</option>
                            @foreach ($mata_pelajaran as $item)
                                <option value="{{ $item->id }}"
                                    {{ $data->id_mata_pelajaran == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_mata_pelajaran }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_pengajar">Pengajar</label>
                        <select class="form-control" id="id_pengajar" name="id_pengajar" required>
                            <option disabled value>Pilih Pengajar</option>
                            @foreach ($pengajar as $item)
                                <option value="{{ $item->id }}" {{ $data->id_pengajar == $item->id ? 'selected' : '' }}>
                                    {{ $item->nama_pengajar }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tanggal">Tanggal :</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal"
                            value="{{ $data->tanggal }}">
                    </div>

                    <div class="form-group">
                        <label for="nomor_urut_peserta">Nomor Urut Peserta</label>
                        <input type="text" class="form-control" id="nomor_urut_peserta" name="nomor_urut_peserta"
                            autocomplete="tel" value="{{ $data->nomor_urut_peserta }}" required>
                    </div>

                    <div class="form-group">
                        <label for="hari">Hari</label>
                        <select class="form-control" id="hari" name="hari" required>
                            <option value="Senin" {{ $data->hari == 'Senin' ? 'selected' : '' }}>Senin</option>
                            <option value="Selasa" {{ $data->hari == 'Selasa' ? 'selected' : '' }}>Selasa</option>
                            <option value="Rabu" {{ $data->hari == 'Rabu' ? 'selected' : '' }}>Rabu</option>
                            <option value="Kamis" {{ $data->hari == 'Kamis' ? 'selected' : '' }}>Kamis</option>
                            <option value="Jum at" {{ $data->hari == 'Jum at' ? 'selected' : '' }}>Jum at</option>
                            <option value="Sabtu" {{ $data->hari == 'Sabtu' ? 'selected' : '' }}>Sabtu</option>
                            <option value="Minggu" {{ $data->hari == 'Minggu' ? 'selected' : '' }}>Minggu</option>
                        </select>

                        <div class="form-group">
                            <label for="jam">Jam</label>
                            <input type="text" class="form-control" id="jam" name="jam"
                                value="{{ $data->jam }}"">
                        </div>



                        <div>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
@endsection
