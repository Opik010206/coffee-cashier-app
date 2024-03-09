<?php

namespace App\Exports;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function view(): View
    // {
    //     return view('pages.category.export', [
    //         'category' => Category::all()
    //     ]);
    // }

    public function collection()
    {
        return Category::all();
    }
    
}
