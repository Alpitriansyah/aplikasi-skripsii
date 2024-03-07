<?php

namespace Database\Seeders;

use App\Models\Ruangan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RuanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 5; $i++) {
            Ruangan::create([
                'name' => fake()->sentence(),
                'lokasi' => fake()->randomElement(['Gedung Baru', 'Gedung Lama']),
                'kapasitas' => 50,
                'status_level' => fake()->randomElement(['Dosen', 'Mahasiswa', 'Mahasiswa dan Dosen']),
                'status' => fake()->randomElement(['Tersedia', 'Tidak Tersedia'])
            ]);
        }
    }
}
