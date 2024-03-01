<?php

namespace App\Imports;

use App\Models\Karyawan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class KaryawanImport implements ToModel
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Karyawan([
            'nip' => $row[1],
            'nik' => $row[2],
            'nama' => $row[3],
            'jenis_kelamin' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => $row[6],
            'no_telp' => $row[7],
            'agama' => $row[8],
            'status_nikah' => $row[9],
            'alamat' => $row[10],
            'foto' => $row[11],
        ]);
    }
}
