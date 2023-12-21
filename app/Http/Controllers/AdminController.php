<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        return view('admin.index');
    }

    public function dashboardPeminjaman()
    {
        return view('admin.peminjaman');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function dashboardRuangan()
    {
        return view('admin.ruangan');
    }

    public function dashboardUser()
    {
        return view('admin.user');
    }

    public function showPeminjaman()
    {
        $pinjam = Peminjaman::latest()->with('ruangan')->get();

        return view('admin.peminjaman', compact('pinjam'));
    }

    public function showProfileAdmin()
    {
        $pinjam = Peminjaman::latest()->with('ruangan')->get();

        return view('admin.profile', compact('pinjam'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

        /**
     * Store a newly created resource in storage.
     */
    public function showUser()
    {
        $user = User::latest()->get();

        return view('admin.user', compact('user'));
    }

    public function showRuangan()
    {
        $ruangan = Ruangan::latest()->get();

        return view('admin.ruangan', compact('ruangan'));
    }

    /**
     * Display the specified resource.
     */
    public function showCreatePeminjaman()
    {
        return view('admin.create_peminjaman');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
