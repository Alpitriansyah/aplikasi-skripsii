<?php

namespace Database\Seeders;

use App\Models\Peminjaman;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeminjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'user_id' => '1',
                'nama_peminjam' => '1915036040',
                'jurusan' => 'Admin',
                'keperluan' => 'Seminar',
                'tanggal_mulai' => date('Y-m-d'),
                'tanggal_selesai' => date('Y-m-d'),
                'deskripsi' => 'Peminjaman untuk seminar',
                'status' => 'Diproses',
            ],
            [
                'ruangan_id' => '1',
                'user_id' => '1',
                'nama_peminjam' => 'Indra',
                'jurusan' => 'Admin',
                'keperluan' => 'Seminar',
                'tanggal_mulai' => date('Y-m-d'),
                'tanggal_selesai' => date('Y-m-d'),
                'deskripsi' => 'Peminjaman untuk seminar',
                'status' => 'Dipinjam',
            ],
        ];

        foreach ($userData as $key => $val){
            Peminjaman::create($val);
        }
    }
}
