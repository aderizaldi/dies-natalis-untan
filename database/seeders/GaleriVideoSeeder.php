<?php

namespace Database\Seeders;

use App\Models\GaleriVideo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GaleriVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GaleriVideo::create([
            'url' => 'https://www.youtube.com/embed/7e90gBu4pas',
        ]);
    }
}
