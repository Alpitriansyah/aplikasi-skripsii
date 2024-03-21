<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use Carbon\Carbon;
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
                $color = 'bg-primary border border-white';
            }
            if ($peminjaman->keperluan == 'Talkshow' && $peminjaman->status == 'Dipinjam') {
                $color = 'bg-success border border-white';
            }
            if ($peminjaman->keperluan == 'Pelatihan' && $peminjaman->status == 'Dipinjam') {
                $color = 'bg-success border border-white';
            }
            if ($peminjaman->keperluan == 'Talkshow' && $peminjaman->status == 'Diproses') {
                $color = 'bg-primary border border-white';
            }
            if ($peminjaman->keperluan == 'Musyawarah_Besar' && $peminjaman->status == 'Diproses') {
                $color = 'bg-danger border border-white';
            }
            if ($peminjaman->keperluan == 'Musyawarah_Besar' && $peminjaman->status == 'Dipinjam') {
                $color = 'bg-danger border border-white';
            }


            $startDateTime = Carbon::parse($peminjaman->tanggal_mulai . ' ' . $peminjaman->waktu_mulai);
            $endDateTime = Carbon::parse($peminjaman->tanggal_selesai . ' ' . $peminjaman->waktu_selesai);
            // dd($mulai, $selesai);
            $events[] = [
                'id' => $peminjaman->id,
                'title' => $peminjaman->nama_peminjam,
                'start' => $startDateTime,
                'end' => $endDateTime,
                'extendedProps' => [
                    'jam_mulai' => $peminjaman->waktu_mulai,
                    'jam_selesai' => $peminjaman->waktu_selesai,
                    'status' => $peminjaman->status,
                    'keperluan' => $peminjaman->keperluan,
                ],
                'status' => $peminjaman->status,
                'allDay' => false,
                'className' => $color,
                // 'url' => '#login'
            ];
        }

        return view('landingpage', compact('events', 'ruanganAll', 'peminjaman_events'));
    }
}
