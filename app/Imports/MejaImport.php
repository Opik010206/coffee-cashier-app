<?php

namespace App\Imports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\ToModel;

class MejaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Meja([
            'no_meja' => $row[1],
            'kapasitas' => $row[2],
            'status' => $row[3],
        ]);
    }
}
