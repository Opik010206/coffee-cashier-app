<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            JenisSeeder::class,
            MenuSeeder::class,
            StockSeeder::class,
            MejaSeeder::class,
            PelangganSeeder::class,
            KaryawanSeeder::class,
        ]);

        \App\Models\Pelanggan::factory(50)->create();
        // \App\Models\Menu::factory(20)->create();

    }
}
