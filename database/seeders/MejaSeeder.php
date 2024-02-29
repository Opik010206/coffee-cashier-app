<?php

namespace Database\Seeders;

use App\Models\Meja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Meja::create([
            'no_meja' => 19,
            'kapasitas' => 5,
            'status' => 'terpenuhi'
        ]);
        Meja::create([
            'no_meja' => 5,
            'kapasitas' => 10,
            'status' => 'terpenuhi'
        ]);
        Meja::create([
            'no_meja' => 23,
            'kapasitas' => 7,
            'status' => 'kosong'
        ]);
        Meja::create([
            'no_meja' => 15,
            'kapasitas' => 3,
            'status' => 'terpenuhi'
        ]);
    }
}
