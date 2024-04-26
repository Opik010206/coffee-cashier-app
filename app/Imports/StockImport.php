<?php

namespace App\Imports;

use App\Models\Stock;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StockImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Stock([
            // 'id' => $row[0],
            'menu_id' => $row['menu_id'],
            'jumlah' => $row['jumlah'],
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
