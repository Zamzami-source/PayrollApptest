@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Absensi</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif


    <div class="table-responsive col-lg-6">
        <div class="d-flex justify-content-end mb-2">
            <a href="/laporan" class="btn btn-primary mb-2" target="_blank">Laporan</a>
        </div>
        <a href="/absensi/create" class="btn btn-success mb-3">Add Absensi</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama Pegawai</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam Masuk</th>
                    <th scope="col">Jam Pulang</th>
                    <th scope="col">Kehadiran</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensis as $absensi)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $absensi->created_at }}</td>
                        <td>{{ $absensi->pegawai->nama_pegawai }}</td>
                        <td>{{ $absensi->harikerja->hari }}</td>
                        <td>{{ $absensi->harikerja->jam_masuk }}</td>
                        <td>{{ $absensi->harikerja->jam_pulang }}</td>
                        <td>{{ $absensi->kehadiran }}</td>
                        <td>
                            <form action="/absensi/{{ $absensi->id }}" method="POST" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
