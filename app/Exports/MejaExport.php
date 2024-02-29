<?php

namespace App\Exports;

use App\Models\Meja;
use Maatwebsite\Excel\Concerns\FromCollection;

class MejaExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Meja::all();
    }
}
