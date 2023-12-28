<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Mahasiswa::create([
                'name' => fake()->name(),
                'nim' => fake()->numerify('##########'),
                'password' => Hash::make('password'),
                'jenis_kelamin' => fake()->randomElement('Pria', 'Perempuan'),
                'level' => 'mhs'
            ]);
        }
    }
}
