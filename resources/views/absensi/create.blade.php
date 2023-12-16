@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Add New Absensi</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/absensi" class="mb-5">
            @csrf
            <input type="hidden" name="keterlambatan">
            <input type="hidden" name="denda">
            <div class="mb-3">
                <label for="pegawai_id" class="form-label">Nama Pegawai</label>
                <select class="form-select" name="pegawai_id">
                    @foreach ($pegawais as $pegawai)
                        @if (old('pegawai_id') == $pegawai->id)
                            <option value="{{ $pegawai->id }}" selected>{{ $pegawai->nama_pegawai }}</option>
                        @else
                            <option value="{{ $pegawai->id }}">{{ $pegawai->nama_pegawai }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="hari_id" class="form-label">Hari</label>
                <select class="form-select" name="hari_id">
                    @foreach ($harikerjas as $harikerja)
                        @if (old('hari_id') == $harikerja->id)
                            <option value="{{ $harikerja->id }}" selected>{{ $harikerja->hari }}</option>
                        @else
                            <option value="{{ $harikerja->id }}">{{ $harikerja->hari }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="kehadiran" class="form-label">Kehadiran</label>
                <select class="form-select" name="kehadiran" id="kehadiran">
                    <option value="1">Hadir</option>
                    <option value="0">Tidak Hadir</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Add Absensi</button>
        </form>
    </div>
@endsection
