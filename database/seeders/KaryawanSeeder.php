<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'nama' => 'Evelina Nigela',
            'nip' => '200938400232',
            'nik' => '210197400882',
            'jenis_kelamin' => 'wanita',
            'tempat_lahir' => 'Cianjur',
            'tanggal_lahir' => '2010-08-23',
            'no_telp' => '082347651',
            'agama' => 'Islam',
            'status_nikah' => 'belum_nikah',
            'alamat' => 'Jl.Gunteng Rt-04 Rw-10',
            'foto' => 'karyawan/tersenyum.jpg',
        ]);
        Karyawan::create([
            'nip' => '200938400232',
            'nik' => '210197400882',
            'nama' => 'Ainur Rofiq',
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => 'Cianjur',
            'tanggal_lahir' => '2006-02-01',
            'no_telp' => '085860310399',
            'agama' => 'Islam',
            'status_nikah' => 'belum_nikah',
            'alamat' => 'Jl.Gunteng Rt-04 Rw-10',
            'foto' => 'karyawan/aing.png',
        ]);
        Karyawan::create([
            'nip' => '200938400232',
            'nik' => '210197400882',
            'nama' => 'Sintayong',
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => 'Korescuy',
            'tanggal_lahir' => '1990-08-23',
            'no_telp' => '082347659320',
            'agama' => 'Kristen',
            'status_nikah' => 'nikah',
            'alamat' => 'Jl.Krespo No.032',
            'foto' => 'karyawan/sintayong.jpeg',
        ]);
        Karyawan::create([
            'nip' => '200938400232',
            'nik' => '210197400882',
            'nama' => 'Dion Zyan',
            'jenis_kelamin' => 'pria',
            'tempat_lahir' => 'Cianjur',
            'tanggal_lahir' => '1990-08-23',
            'no_telp' => '082347659320',
            'agama' => 'Islam',
            'status_nikah' => 'belum_nikah',
            'alamat' => 'Jl.Gunteng No.032',
            'foto' => 'karyawan/Leonardo.jpg',
        ]);
        Karyawan::create([
            'nip' => '536433265657',
            'nik' => '773421313554',
            'nama' => 'Yanti Febrianti',
            'jenis_kelamin' => 'wanita',
            'tempat_lahir' => 'Cianjur',
            'tanggal_lahir' => '2006-02-07',
            'no_telp' => '082347659320',
            'agama' => 'Islam',
            'status_nikah' => 'belum_nikah',
            'alamat' => 'Jl.Gombong No.032',
            'foto' => 'karyawan/A.jpg',
        ]);
    }
}
