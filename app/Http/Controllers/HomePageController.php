<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {

        $events = [];
        $peminjaman_events = Peminjaman::latest()->with('ruangan')->get();
        foreach ($peminjaman_events as $peminjaman) {
            if ($peminjaman->keperluan == 'Seminar') {
                $color = 'bg-danger';
            }
            if ($peminjaman->keperluan == 'Pelatihan') {
                $color = 'bg-success';
            }
            $events[] = [
                'title' => $peminjaman->nama_peminjam,
                'start' => $peminjaman->tanggal_mulai,
                'end' => $peminjaman->tanggal_selesai,

                'className' => $color
            ];
        }

        return view('landingpage', compact('events'));
    }
}
