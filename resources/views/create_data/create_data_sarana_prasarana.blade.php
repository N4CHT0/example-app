@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body justify-content-between">
                <p>
                    Tambah Data Sarana & Prasarana BBU
                </p>
                <form action="{{ route('SAPRAS.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="jenis_fasilitas">Jenis Fasilitas</label>
                        <input type="text" class="form-control" id="jenis_fasilitas" name="jenis_fasilitas" required>
                    </div>

                    <div class="form-group">
                        <label for="nama_fasilitas">Nama Fasilitas</label>
                        <input type="text" class="form-control" id="nama_fasilitas" name="nama_fasilitas" required>
                    </div>

                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" required>
                    </div>

                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <select class="form-control" id="kondisi" name="kondisi" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="GOOD">GOOD</option>
                            <option value="BAD">BAD</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" id="status" name="status" required>
                            <!-- Pilihan role sesuai dengan kebutuhan -->
                            <option value="NEED REPAIR">NEED REPAIR</option>
                            <option value="READY TO USE">READY TO USE</option>
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
