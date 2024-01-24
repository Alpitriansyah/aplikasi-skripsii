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
            $events[] = [
                'title' => $peminjaman->nama_peminjam,
                'start' => $peminjaman->tanggal_mulai,
                'end' => $peminjaman->tanggal_selesai,
            ];
        }

        return view('landingpage', compact('events'));
    }
}
