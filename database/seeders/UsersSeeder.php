<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'indra',
                'email' => 'indra@gmail.com',
                'password' => bcrypt(12345678),
                'level' => 'admin',
                'jenis_kelamin' => 'Laki-Laki',
            ],
        ];

        foreach ($userData as $key => $val){
            User::create($val);
        }
    }
}
