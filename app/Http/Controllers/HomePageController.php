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

        $ruanganAll = Ruangan::all();
        $events = [];
        $peminjaman_events = Peminjaman::latest()->with('ruangan')->get();
        foreach ($peminjaman_events as $peminjaman) {
            if ($peminjaman->keperluan == 'Seminar' && $peminjaman->status == 'Diproses') {
                $color = 'bg-success border border-white';
            }
            if ($peminjaman->keperluan == 'Seminar' && $peminjaman->status == 'Dipinjam') {
                $color = 'bg-primary border border-white';
            }
            if ($peminjaman->keperluan == 'Pelatihan' && $peminjaman->status == 'Dipinjam') {
                $color = 'bg-success border border-white';
            }
            if ($peminjaman->keperluan == 'Seminar' && $peminjaman->status == 'Diproses') {
                $color = 'bg-primary border border-white';
            }
            $events[] = [
                'id' => $peminjaman->id,
                'title' => $peminjaman->nama_peminjam,
                'start' => $peminjaman->tanggal_mulai,
                'end' => $peminjaman->tanggal_selesai,
                'keperluan' => $peminjaman->keperluan,
                'className' => $color,
                'url' => '#login'
            ];
        }

        return view('landingpage', compact('events', 'ruanganAll'));
    }
}
