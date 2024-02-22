<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Indra Wijaya',
            'email' => 'indra@gmail.com',
            'password' => Hash::make('password'),
            'jenis_kelamin' => 'Pria',
            'level' => 'admin',
            'hidden' => true,
            'email_verified_at' => now()
        ]);

        for ($i = 0; $i < 5; $i++) {
            User::create([
                'name' => fake()->name(),
                'email' => fake()->email(),
                'password' => Hash::make('password'),
                'jenis_kelamin' => fake()->randomElement(['Pria', 'Perempuan']),
                'level' => 'admin',
                'hidden' => false,
                'email_verified_at' => now()
            ]);
        }
    }
}
