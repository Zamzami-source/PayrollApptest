<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Kehadiran Pegawai</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Laporan Kehadiran Pegawai</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Nama Pegawai</th>
                <th>Hari</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <th>Kehadiran</th>
                <th>Keterlambatan</th>
                <th>Denda</th>
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
                    <td>{{ $absensi->keterlambatan }} Menit</td>
                    <td>Rp. {{ number_format($absensi->denda, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>

<script>
    window.onload = function() {
        window.print();
    };
</script>
