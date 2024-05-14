@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Edit Data Keuangan
                </p>
                <form action="{{ route('SAPRAS.update', $data->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="jenis_fasilitas">Jenis Fasilitas:</label>
                        <input type="text" class="form-control" id="jenis_fasilitas" name="jenis_fasilitas"
                            value="{{ $data->jenis_fasilitas }}" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_fasilitas">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas"
                            autocomplete="name" value="{{ $data->nama_fasilitas }}" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah"
                            value="{{ $data->jumlah }}"">
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" id="kondisi" name="kondisi" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="GOOD" {{ $data->kondisi == 'GOOD' ? 'selected' : '' }}>
                                GOOD</option>
                            <option value="BAD" {{ $data->kondisi == 'BAD' ? 'selected' : '' }}>
                                BAD</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="NEED REPAIR" {{ $data->status == 'NEED REPAIR' ? 'selected' : '' }}>NEED REPAIR
                            </option>
                            <option value="READY TO USE" {{ $data->status == 'READY TO USE' ? 'selected' : '' }}>READY TO
                                USE
                            </option>
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
