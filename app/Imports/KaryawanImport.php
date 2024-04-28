<?php

namespace App\Imports;

use App\Models\Karyawan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Karyawan([
            'nama' => $row['nama_karyawan'],
            'nip' => $row['nip'],
            'nik' => $row['nik'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'no_telp' => $row['no_hp'],
            'agama' => $row['agama'],
            'status_nikah' => $row['status_nikah'],
            'alamat' => $row['alamat'],
            'foto' => $row['image_file'],
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
