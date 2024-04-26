<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MejaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Meja([
            'no_meja' => $row['no_meja'],
            'kapasitas' => $row['kapasitas'],
            'status' => $row['status'],
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
