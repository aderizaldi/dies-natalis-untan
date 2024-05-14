<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Agenda;
use App\Models\Berita;
use App\Models\BeritaTag;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Galeri;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);
        // User::factory(10)->create()
        User::factory()->create([
            'nama' => 'Admin',
            'username' => 'admin',
        ])->assignRole('ADMIN');

        User::factory()->create([
            'nama' => 'Superadmin',
            'username' => 'superadmin',
        ])->assignRole('SUPERADMIN');

        Agenda::factory(10)->create();
        Berita::factory(12)->has(BeritaTag::factory()->count(3))->create();
        Galeri::factory(9)->create();
        $this->call(LogoSeeder::class);
        $this->call(SambutanSeeder::class);
        $this->call(GaleriVideoSeeder::class);
    }
}
