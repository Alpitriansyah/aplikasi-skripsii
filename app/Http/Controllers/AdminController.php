<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
        $ruangan = Ruangan::all();
        return view('admin.create_peminjaman', compact('ruangan'));
    }

    public function storeCreatePeminjamanPost(Request $request)
    {
        // dd($request->all());
        $validateData = $this->validate($request,[
            'nama_peminjam' => 'required',
            'jurusan' => 'required',
            'ruangan' => 'required',
            'keperluan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
        ]);


        if(Auth::guard('user')->check()){
            $validateData['user_id'] = Auth::guard('user')->id();

            Peminjaman::create([
                'user_id' => $validateData['user_id'],
                'nama_peminjam' => $validateData['nama_peminjam'],
                'jurusan' => $validateData['jurusan'],
                'ruangan_id' => 1,
                'keperluan' => $validateData['keperluan'],
                'tanggal_mulai' => $validateData['tanggal_mulai'],
                'tanggal_selesai' => $validateData['tanggal_selesai'],
                'deskripsi' => $validateData['deskripsi'],
                'status' => 'Diproses'
             ]);
        }
        if(Auth::guard('mahasiswa')->check()){
            $validateData['mahasiswa_id'] = Auth::guard('mahasiswa')->id();

            Peminjaman::create([
                'mahasiswa_id' => $validateData['mahasiswa_id'],
                'nama_peminjam' => $validateData['nama_peminjam'],
                'jurusan' => $validateData['jurusan'],
                'ruangan_id' => 1,
                'keperluan' => $validateData['keperluan'],
                'tanggal_mulai' => $validateData['tanggal_mulai'],
                'tanggal_selesai' => $validateData['tanggal_selesai'],
                'deskripsi' => $validateData['deskripsi'],
                'status' => 'Diproses'
             ]);
        }
        if(Auth::guard('dosen')->check()){
            $validateData['dosen_id'] = Auth::guard('dosen')->id();

            Peminjaman::create([
                'dosen_id' => $validateData['dosen_id'],
                'nama_peminjam' => $validateData['nama_peminjam'],
                'jurusan' => $validateData['jurusan'],
                'ruangan_id' => 1,
                'keperluan' => $validateData['keperluan'],
                'tanggal_mulai' => $validateData['tanggal_mulai'],
                'tanggal_selesai' => $validateData['tanggal_selesai'],
                'deskripsi' => $validateData['deskripsi'],
                'status' => 'Diproses'
             ]);
        }

        return redirect()->route('DashboardPeminjamanAdmin')->with(['Success' => 'Data berhasil disimpan !']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $peminjaman = Peminjaman::findOrFail($id)->with('ruangan')->first();
        $ruangan = Ruangan::all();

        return view('admin.show_peminjaman', compact('peminjaman','ruangan'));
    }
    
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validateData = $this->validate($request,[
            'nama_peminjam' => 'required',
            'jurusan' => 'required',
            'ruangan' => 'required',
            'keperluan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
        ]);
    }

    public function showCreateRuangan()
    {
        return view('admin.create_ruangan');
    }

    public function storeCreateRuanganPost(Request $request)
    {
        // dd($request->all());
        $validateData = $this->validate($request,[
            'nama_ruangan' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
            'status_level' => 'required',
            'status' => 'required',
        ]);
        
        Ruangan::create([
            'name' => $validateData['nama_ruangan'],
            'lokasi' => $validateData['lokasi'],
            'kapasitas' => $validateData['kapasitas'],
            'status_level' => $validateData['status_level'],
            'status' => $validateData['status']
         ]);


        return redirect()->route('DashboardRuangan')->with(['Success' => 'Data berhasil disimpan !']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
