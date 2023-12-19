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
        $ruanganData = [
            [
                'name' => 'Asrofi',
                'lokasi' => 'Gedung Lama',
                'kapasitas' => 50,
            ],
        ];

        foreach ($ruanganData as $key => $val){
            Ruangan::create($val);
        }
    }
}
