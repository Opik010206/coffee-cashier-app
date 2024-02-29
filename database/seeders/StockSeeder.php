<?php

namespace Database\Seeders;

use App\Models\Stock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Stock::create([
            'menu_id' => 1,
            'jumlah' => 50,
        ]);
        Stock::create([
            'menu_id' => 2,
            'jumlah' => 35,
        ]);
        Stock::create([
            'menu_id' => 3,
            'jumlah' => 20,
        ]);
    }
}
