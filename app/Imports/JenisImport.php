<?php

namespace App\Imports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class JenisImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jenis([
            'nama' => $row['nama_jenis'],
            'kategory_id' => $row['kategori_id'],
        ]);
    }

    public function headingRow(): int
    {
        return 4;  // The row number at which the first row
    }
}
