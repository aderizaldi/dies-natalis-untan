<?php

namespace Database\Seeders;

use App\Models\Sambutan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SambutanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sambutan::create([
            'tipe' => 'rektor',
            'deskripsi' => 'Selamat datang di website kami. Kami senang bisa berbagi informasi dengan Anda. Semoga website ini bermanfaat bagi Anda semua. Terima kasih.',
        ]);
        Sambutan::create([
            'tipe' => 'ketua_panitia',
            'deskripsi' => 'Selamat datang di website kami. Kami senang bisa berbagi informasi dengan Anda. Semoga website ini bermanfaat bagi Anda semua. Terima kasih.',
        ]);
    }
}
