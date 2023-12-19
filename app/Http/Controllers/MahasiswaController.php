<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    function dashboard(){
        return view('mahasiswa.index');
    }

    function viewPeminjaman(){
        return view('admin.peminjaman');
    }
}
