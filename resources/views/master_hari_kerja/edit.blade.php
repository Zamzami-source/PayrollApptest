@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Data Hari Kerja</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/master_hari_kerja/{{ $hari_kerjas->id }}" class="mb-5">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="hari" class="form-label">Hari</label>
                <input type="text" class="form-control @error('hari') is-invalid @enderror" id="hari" name="hari"
                    required autofocus value="{{ $hari_kerjas->hari }}">
                @error('hari')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jam_masuk" class="form-label">Jam Masuk</label>
                <input type="time" class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk"
                    name="jam_masuk" required autofocus value="{{ $hari_kerjas->jam_masuk }}">
                @error('jam_masuk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="jam_pulang" class="form-label">Jam Pulang</label>
                <input type="time" class="form-control @error('jam_pulang') is-invalid @enderror" id="jam_pulang"
                    name="jam_pulang" required autofocus value="{{ $hari_kerjas->jam_pulang }}">
                @error('jam_pulang')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Update Data</button>
        </form>
    </div>
@endsection
