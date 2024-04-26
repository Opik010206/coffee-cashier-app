<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
        }
    </style>
</head>
<body>
    <h1>Data Absensi Karyawan</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Karyawan</th>
                <th>Tanggal Masuk</th>
                <th>Status</th>
                <th>Waktu Keluar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $employee)
            <tr>
                <td>{{ $i = (!isset($i)?1:++$i) }}</td>
                <td>{{ $employee->nama_karyawan }}</td>
                <td>{{ $employee->tanggal_masuk }}</td>
                <td>{{ $employee->status }}</td>
                <td>{{ $employee->waktu_keluar }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>