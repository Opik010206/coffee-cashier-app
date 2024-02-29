<?php

namespace Database\Seeders;

use App\Models\Jenis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jenis::create([
            'nama' => 'Dimsum',
            'kategory_id' => 1,
        ]);
        Jenis::create([
            'nama' => 'Sotang',
            'kategory_id' => 1,
        ]);
        Jenis::create([
            'nama' => 'Nasgor',
            'kategory_id' => 1,
        ]);
        Jenis::create([
            'nama' => 'Teh',
            'kategory_id' => 2,
        ]);
        Jenis::create([
            'nama' => 'Jus',
            'kategory_id' => 2,
        ]);
    }
}
