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

    /**
     * Peminjaman.
     */

    public function dashboardPeminjaman()
    {
        return view('admin.peminjaman.index');
    }

    public function showPeminjaman()
    {
        $pinjam = Peminjaman::latest()->with('ruangan')->get();

        return view('admin.peminjaman.index_peminjaman', compact('pinjam'));
    }


    public function showCreatePeminjaman()
    {
        $ruangan = Ruangan::all();
        return view('admin.peminjaman.create_peminjaman', compact('ruangan'));
    }

    public function storeCreatePeminjamanPost(Request $request)
    {
        // dd($request->all());
        $validateData = $this->validate($request, [
            'nama_peminjam' => 'required',
            'jurusan' => 'required',
            'ruangan_id' => 'required',
            'keperluan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
        ]);


        if (Auth::guard('user')->check()) {
            $validateData['user_id'] = Auth::guard('user')->id();

            Peminjaman::create([
                'user_id' => $validateData['user_id'],
                'nama_peminjam' => $validateData['nama_peminjam'],
                'jurusan' => $validateData['jurusan'],
                'ruangan_id' => $validateData['ruangan_id'],
                'keperluan' => $validateData['keperluan'],
                'tanggal_mulai' => $validateData['tanggal_mulai'],
                'tanggal_selesai' => $validateData['tanggal_selesai'],
                'deskripsi' => $validateData['deskripsi'],
                'status' => 'Diproses'
            ]);

            Ruangan::where('id', $validateData['ruangan_id'])->update(['status' => 'Tidak Tersedia']);
        }
        if (Auth::guard('mahasiswa')->check()) {
            $validateData['mahasiswa_id'] = Auth::guard('mahasiswa')->id();

            Peminjaman::create([
                'mahasiswa_id' => $validateData['mahasiswa_id'],
                'nama_peminjam' => $validateData['nama_peminjam'],
                'jurusan' => $validateData['jurusan'],
                'ruangan_id' => $validateData['ruangan_id'],
                'keperluan' => $validateData['keperluan'],
                'tanggal_mulai' => $validateData['tanggal_mulai'],
                'tanggal_selesai' => $validateData['tanggal_selesai'],
                'deskripsi' => $validateData['deskripsi'],
                'status' => 'Diproses'
            ]);
            Ruangan::where('id', $validateData['ruangan_id'])->update('status', 'Tidak Tersedia');
        }
        if (Auth::guard('dosen')->check()) {
            $validateData['dosen_id'] = Auth::guard('dosen')->id();

            Peminjaman::create([
                'dosen_id' => $validateData['dosen_id'],
                'nama_peminjam' => $validateData['nama_peminjam'],
                'jurusan' => $validateData['jurusan'],
                'ruangan_id' => $validateData['ruangan_id'],
                'keperluan' => $validateData['keperluan'],
                'tanggal_mulai' => $validateData['tanggal_mulai'],
                'tanggal_selesai' => $validateData['tanggal_selesai'],
                'deskripsi' => $validateData['deskripsi'],
                'status' => 'Diproses'
            ]);
        }

        return redirect()->route('DashboardPeminjamanAdmin')->with(['Success' => 'Data berhasil disimpan !']);
    }

    public function edit(string $id)
    {

        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        $ruangan = Ruangan::all();

        return view('admin.peminjaman.update_peminjaman', compact('peminjaman', 'ruangan'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroyPeminjaman(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('DashboardPeminjamanAdmin')->with(['success' => 'Peminjaman Berhasil Dihapus!']);
    }

    /**
     * Ruangan
     */
    public function dashboardRuangan()
    {
        return view('admin.ruangan.index_ruangan');
    }

    public function showRuangan()
    {
        $ruangan = Ruangan::latest()->get();

        return view('admin.ruangan.index_ruangan', compact('ruangan'));
    }

    public function storeCreateRuanganPost(Request $request)
    {
        // dd($request->all());
        $validateData = $this->validate($request, [
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


    public function dashboardUser()
    {
        return view('admin.user.show_user');
    }

    public function showProfileAdmin()
    {
        $user = User::latest()->first();

        return view('admin.profile.index_profile', compact('user'));
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

        return view('admin.user.show_user', compact('user'));
    }


    public function showDetailPeminjaman(string $id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        // dd($peminjaman);
        return view('admin.peminjaman.show_peminjaman', compact('peminjaman'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function updatePeminjaman(Request $request, string $id)
    {
        // dd($request->all());
        $validateData = $this->validate($request, [
            'nama_peminjam' => 'required',
            'ruangan_id' => 'required',
            'keperluan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
        ]);


        $peminjaman = Peminjaman::findOrFail($id);

        $updateRuangan = Ruangan::whereHas('peminjaman', function ($query) use ($id) {
            $query->where('id', $id);
        })->first()->update([
            'status' => 'Tersedia',
        ]);

        $peminjaman->update([
            'nama_peminjam' => $validateData['nama_peminjam'],
            'ruangan_id' => $validateData['ruangan_id'],
            'keperluan' => $validateData['keperluan'],
            'tanggal_mulai' => $validateData['tanggal_mulai'],
            'tanggal_selesai' => $validateData['tanggal_selesai'],
            'deskripsi' => $validateData['deskripsi'],
            'status' => $validateData['status'],
        ]);



        Ruangan::where('id', $validateData['ruangan_id'])->update([
            'status' => 'Tidak Tersedia'
        ]);

        return redirect()->route('DashboardPeminjamanAdmin')->with(['Success' => 'Data berhasil diubah !']);
    }

    public function showCreateRuangan()
    {
        return view('admin.ruangan.create_ruangan');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
