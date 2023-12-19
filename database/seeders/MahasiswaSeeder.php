<?php

namespace Database\Seeders;

use App\Models\Mahasiswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Asrofi',
                'nim' => '1915036040',
                'password' => bcrypt(12345678),
                'level' => 'mhs',
                'jenis_kelamin' => 'Laki-Laki',
            ],
        ];

        foreach ($userData as $key => $val){
            Mahasiswa::create($val);
        }
    }
}
