<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PartnerLogo;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'key' => 'GAMBAR_HEADER',
            'value' => fake()->imageUrl(1920, 1080),
        ]);
        Setting::create([
            'key' => 'VIDEO_TESTIMONI',
            'value' => 'https://www.youtube.com/embed/tBgh6vayvnk?si=VMUBbcd3Z94NKQ9W'
        ]);
        Setting::create([
            'key' => 'VIDEO_LIVESTREAM',
            'value' => 'https://www.youtube.com/embed/5Lcd3ZOv1PQ?si=HUrlTSjFq6R03MZH'
        ]);
        PartnerLogo::factory(4)->create();
    }
}
