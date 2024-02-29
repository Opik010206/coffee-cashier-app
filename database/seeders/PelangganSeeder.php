<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'nama' => 'Ainur Rofiq',
            'email' => 'rofiq123@gmail.com',
            'no_telp' => '085860310399',
            'alamat' => 'Jl.Gunteng Komplek LDII'
        ]);
        Pelanggan::create([
            'nama' => 'Dion Zyan',
            'email' => 'dion032@yahoo.com',
            'no_telp' => '085863543452',
            'alamat' => 'Jl.Gunteng Komplek LDII'
        ]);
        Pelanggan::create([
            'nama' => 'Gin Gin Nurilham',
            'email' => 'ginginyo@example.com',
            'no_telp' => '085863123324',
            'alamat' => 'Jl.Pangrango No. 7'
        ]);
        Pelanggan::create([
            'nama' => 'Raihan Ramadhan',
            'email' => 'ehangd@gmail.com',
            'no_telp' => '085863092731',
            'alamat' => 'Jl.Primadoni No. 15 Desa Kapuk'
        ]);
        Pelanggan::create([
            'nama' => 'Dion Zyan',
            'email' => 'dion032@yahoo.com',
            'no_telp' => '085863543452',
            'alamat' => 'Jl.Gunteng Komplek LDII'
        ]);
    }
}
