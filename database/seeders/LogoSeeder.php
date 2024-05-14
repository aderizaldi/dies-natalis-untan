<?php

namespace Database\Seeders;

use App\Models\Logo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LogoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Logo::create([
            'gambar' => 'logo.png',
            'deskripsi' => 'ini deskripsi ...',
        ]);
    }
}
