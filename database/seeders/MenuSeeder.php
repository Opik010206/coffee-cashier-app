<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'nama' => 'Dimsum Sapi',
            'harga' => 2000,
            'image' => 'menu/dimsum1.png',
            'deskripsi' => 'Dimsum dengan rasa sapi',
            'jenis_id' => 1
        ]);
        Menu::create([
            'nama' => 'Dimsum Ayam',
            'harga' => 5000,
            'image' => 'menu/dimsum2.png',
            'deskripsi' => 'Dimsum dengan rasa ayam',
            'jenis_id' => 1
        ]);
        Menu::create([
            'nama' => 'Dimsum Telur',
            'harga' => 4500,
            'image' => 'menu/dimsum5.png',
            'deskripsi' => 'Dimsum mirip seperti telur ayam',
            'jenis_id' => 1
        ]);
    }
}
