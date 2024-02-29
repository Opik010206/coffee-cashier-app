<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Menu>
 */
class MenuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $this->faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($this->faker));
        return [
            'nama' => $this->faker->foodName(),
            'harga' => $this->faker->randomFloat(2, 10,  50),
            'jenis_id' => mt_rand(1, 5),
            'deskripsi' => $this->faker->paragraph(),
            'image' => fake()->image('public/storage/menu', 300, 300, NULL, true, true, NULL, false),
        ];
    }
}
