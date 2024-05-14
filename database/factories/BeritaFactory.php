<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal' => $this->faker->dateTime,
            'gambar' => $this->faker->imageUrl,
            'judul' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'deskripsi' => $this->faker->paragraph,
        ];
    }
}
