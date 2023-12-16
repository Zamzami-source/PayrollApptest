@extends('layout.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Master Pegawai</h1>
    </div>

    @if (session()->has('success'))
        <div class="alert alert-success col-lg-6" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive col-lg-6">
        <a href="/master_pegawai/create" class="btn btn-success mb-3">Add Data</a>
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">No Hp</th>
                    <th scope="col">Gaji</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pegawais as $pegawai)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pegawai->nama_pegawai }}</td>
                        <td>{{ $pegawai->no_hp }}</td>
                        <td>Rp. {{ number_format($pegawai->mastergaji->jumlah_gaji, 0, ',', '.') }}</td>
                        <td>
                            <a href="/master_pegawai/{{ $pegawai->id }}/edit" class="btn btn-warning"><i
                                    class="bi bi-pencil-fill"></i></a>
                            <form action="/master_pegawai/{{ $pegawai->id }}" method="POST" class="d-inline">
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
