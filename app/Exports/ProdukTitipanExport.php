<?php

namespace App\Exports;

use App\Models\ProdukTitipan;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProdukTitipanExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ProdukTitipan::all();
    }
}
