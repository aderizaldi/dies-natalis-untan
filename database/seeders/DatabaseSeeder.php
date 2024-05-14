<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesSeeder::class);
        // User::factory(10)->create();

        User::factory()->create([
            'nama' => 'Admin',
            'username' => 'admin',
        ])->assignRole('ADMIN');

        User::factory()->create([
            'nama' => 'Superadmin',
            'username' => 'superadmin',
        ])->assignRole('SUPERADMIN');
    }
}
