<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
        $ruangan = Ruangan::where('status', 'Tersedia')->get();
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
    public function DashboardUser()
    {
        $user = User::latest()->get();
        return view('admin.user.index_user', compact('user'));
    }

    public function CreateUser()
    {
        return view('admin.user.create_user');
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

    public function ShowDetailRuangan(string $id)
    {
        $ruang = Ruangan::where('id', $id)->first();
        return view('admin.ruangan.show_ruangan', compact('ruang'));
    }

    public function updateRuanganDetail(string $id)
    {
        $ruang = Ruangan::where('id', $id)->first();
        return view('admin.ruangan.update_ruangan', compact('ruang'));
    }

    public function updateRuangan(Request $request, string $id)
    {
        // dd($request->all());
        $validateData = $this->validate($request, [
            'nama_ruangan' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
            'status_level' => 'required',
            'status' => 'required',
        ]);

        $ruang = Ruangan::findOrFail($id);

        $ruang->update([
            'name' => $validateData['nama_ruangan'],
            'lokasi' => $validateData['lokasi'],
            'kapasitas' => $validateData['kapasitas'],
            'status_level' => $validateData['status_level'],
            'status' => $validateData['status'],
        ]);

        return redirect()->route('DashboardRuangan')->with(['Success' => 'Data Ruangan berhasil diubah !']);
    }

    public function destroyRuangan(string $id)
    {
        $ruang = Ruangan::findOrFail($id);
        $ruang->delete();

        return redirect()->route('DashboardRuangan')->with(['Success' => 'Data Ruangan Berhasil Dihapus!']);
    }

    public function UpdateProfile(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.profile.update_profile', compact('user'));
    }

    public function UpdateProfilePUT(Request $request, string $id)
    {
        $validateData = $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $profile = User::findOrFail($id);

        $profile->update([
            'name' => $validateData['nama'],
            'email' => $validateData['email'],
            'jenis_kelamin' => $validateData['jenis_kelamin'],
        ]);

        return redirect()->route('ProfileAdmin')->with(['Success' => 'Profile Berhasil Diubah']);
    }

    public function ChangePassword(string $id)
    {
        $user = User::where('id', $id)->first();
        return view('admin.profile.change_password', compact('user'));
    }

    public function ChangePasswordPUT(Request $request, string $id)
    {
        if (!Hash::check($request->old_password, Auth::guard('user')->user()->password)) {
            return back()->with('error', 'Password lama tidak sesuai');
        }
        if ($request->new_password != $request->repeat_password) {
            return back()->with('error', 'Password baru dan password verifikasi tidak sama');
        }

        $user = User::findOrFail($id);

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('ProfileAdmin')->with('Success', 'Password Berhasil Diubah');
    }

    public function DashboardMahasiswa()
    {
        $siswa = Mahasiswa::latest()->get();
        return view('admin.mahasiswa.index_mahasiswa', compact('siswa'));
    }

    public function CreateMahasiswa()
    {
        return view('admin.mahasiswa.create_mahasiswa');
    }

    public function CreateMahasiswaPost()
    {
    }

    public function ShowMahasiswa(string $id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        return view('admin.mahasiswa.show_mahasiswa', compact('mahasiswa'));
    }

    public function ShowUpdateMahasiswa()
    {
        return view('admin.mahasiswa.update_mahasiswa');
    }

    public function ShowUpdateMahasiswaPut()
    {
    }

    public function DashboardDosen()
    {
        $dosen = Dosen::latest()->get();
        return view('admin.dosen.index_dosen', compact('dosen'));
    }

    public function CreateDosen()
    {
        return view('admin.dosen.create_dosen');
    }

    public function CreateDosenPost()
    {
    }

    public function ShowDosen(string $id)
    {
        $dosen = Dosen::where('id', $id)->first();
        return view('admin.dosen.show_dosen', compact('dosen'));
    }

    public function ShowUpdateDosen(string $id)
    {
        $dosen = Dosen::where('id', $id)->first();
        return view('admin.dosen.update_dosen', compact('dosen'));
    }

    public function ShowUpdateMDosenPut()
    {
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
