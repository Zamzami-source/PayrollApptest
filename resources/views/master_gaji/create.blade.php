@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Data Gaji</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/master_gaji" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="jumlah_gaji" class="form-label">Jumlah Gaji/Hari</label>
                <input type="number" class="form-control @error('jumlah_gaji') is-invalid @enderror" id="jumlah_gaji"
                    name="jumlah_gaji" required autofocus>
                @error('jumlah_gaji')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Add Data</button>
        </form>
    </div>
@endsection
