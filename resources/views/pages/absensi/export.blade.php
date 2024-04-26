<style>
    /* Style untuk tabel */
    table {
        border-collapse: collapse;
        width: 100%;
    }

    /* Style untuk sel heading */
    th {
        background-color: #f2f2f2; /* Warna latar belakang */
        border: 1px solid #ddd; /* Border */
        padding: 8px; /* Padding */
        font-weight: bold; /* Tebal */
    }

    /* Style untuk sel data */
    td {
        border: 1px solid #ddd; /* Border */
        padding: 8px; /* Padding */
    }
</style>
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
        @foreach($absensis as $absensi)
        <tr>
            <td>{{ $absensi->id }}</td>
            <td>{{ $absensi->nama_karyawan }}</td>
            <td>{{ $absensi->tanggal_masuk }}</td>
            <td>{{ $absensi->status }}</td>
            <td>{{ $absensi->waktu_keluar }}</td>
        </tr>
        @endforeach
    </tbody>
</table>