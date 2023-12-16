@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Data</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/master_pegawai" class="mb-5">
            @csrf
            <div class="mb-3">
                <label for="nama_pegawai" class="form-label">Nama</label>
                <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" id="nama_pegawai"
                    name="nama_pegawai" required autofocus>
                @error('nama_pegawai')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_hp" class="form-label">No Hp</label>
                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
                    name="no_hp" required autofocus>
                @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="mastergaji" class="form-label">Jumlah Gaji</label>
                <select class="form-select" name="gaji_id">
                    @foreach ($gajis as $gaji)
                        @if (old('gaji_id') == $gaji->id)
                            <option value="{{ $gaji->id }}" selected>Rp.
                                {{ number_format($gaji->jumlah_gaji, 0, ',', '.') }}</option>
                        @else
                            <option value="{{ $gaji->id }}">{{ number_format($gaji->jumlah_gaji, 0, ',', '.') }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Data</button>
        </form>
    </div>
@endsection
