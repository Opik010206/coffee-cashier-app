<?php

namespace App\Imports;

use App\Models\ProdukTitipan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdukTitipanImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function model(array $row)
    {
        return new ProdukTitipan([
            'nama_produk' => $row['nama_produk'],
            'nama_supplier' => $row['nama_suplier'],
            'harga_beli' => $row['harga_beli'],
            'harga_jual' => $row['harga_jual'],
            'stock' => $row['stock'],
            'keterangan' => $row['keterangan'],
        ]);
    }

    public function headingRow(): int
    {
        return 4;
    }
}
