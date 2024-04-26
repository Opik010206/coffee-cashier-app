<?php

namespace App\Imports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class CategoryImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Category([
            'nama' => $row['nama_kategori'],  //menyimpan data nama kategori dari excel ke database
        ]);
    }
    public function headingRow(): int
    {
        return 4; //baris pertama yang di skip karena tidak ada data
    }
}
