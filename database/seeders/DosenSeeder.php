<?php

namespace Database\Seeders;

use App\Models\Dosen;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DosenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Fadli',
                'nip' => '1915036040',
                'password' => bcrypt(12345678),
                'level' => 'dosen',
                'jenis_kelamin' => 'Laki-Laki',
            ],
        ];

        foreach ($userData as $key => $val){
            Dosen::create($val);
        }
    }
}
