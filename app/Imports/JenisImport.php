<?php

namespace App\Imports;

use App\Models\Jenis;
use Maatwebsite\Excel\Concerns\ToModel;

class JenisImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jenis([
            'nama' => $row[1],
            'kategory_id' => $row[2],
        ]);
    }
}
