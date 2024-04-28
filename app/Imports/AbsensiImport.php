<?php

namespace App\Imports;

use App\Models\Absensi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AbsensiImport implements ToModel, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function model(array $row)
    {
        return new Absensi([
            'karyawan_id' => $row['nama_karyawan'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'waktu_masuk' => $row['waktu_masuk'],
            'status' => $row['status'],
            'waktu_keluar' => $row['waktu_keluar'],
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
