<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            Dosen::create([
                'name' => fake()->name(),
                'nip' => fake()->numerify('##########'),
                'password' => Hash::make('password'),
                'jenis_kelamin' => fake()->randomElement('Pria', 'Perempuan'),
                'level' => 'dosen'
            ]);
        }
    }
}
