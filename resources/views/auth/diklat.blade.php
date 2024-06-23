@extends('layouts.main')
@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary d-flex justify-content-between align-items-center">
                <span style="color: white; font-size: 20px;">Pendaftaran Diklat</span>
            </div>
            <div class="card-body">
                <div class="col-md-15">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <label for="jenis_diklat">Jenis Diklat</label>
                                    <select class="form-control" id="jenis_diklat" name="jenis_diklat" required>
                                        <option value="gmdss">GMDSS</option>
                                        <option value="reor">REOR</option>
                                        <option value="cop">COP</option>
                                    </select>
                                </div>
                                <button id="lanjutkanBtn" class="btn btn-primary mt-3">Lanjutkan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('lanjutkanBtn').addEventListener('click', function() {
            var jenisDiklat = document.getElementById('jenis_diklat').value;
            window.location.href = '/pendaftaran/' + jenisDiklat;
        });
    </script>
@endsection
