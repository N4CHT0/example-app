@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Pengajar
                </p>
                <form action="{{ route('Pengajar.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama_pengajar">Nama Pengajar :</label>
                        <input type="text" class="form-control" id="nama_pengajar" name="nama_pengajar"
                            value="{{ $data->nama_pengajar }}">
                    </div>

                    <div class="form-group">
                        <label for="no_telp">No Telp</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" autocomplete="tel"
                            value="{{ $data->no_telp }}" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email"
                            value="{{ $data->email }}"">
                    </div>

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

                    <div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
