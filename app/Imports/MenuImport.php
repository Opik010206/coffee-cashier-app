<?php

namespace App\Imports;

use App\Models\Menu;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MenuImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Menu([
            'nama' => $row['nama_menu'],
            'harga' => $row['harga'],
            'image' => $row['image'],
            'deskripsi' => $row['deskripsi'],
            'jenis_id' => $row['jenis_menu'],
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
