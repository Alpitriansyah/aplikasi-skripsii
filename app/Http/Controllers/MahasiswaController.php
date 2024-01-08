<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    function dashboard()
    {
        return view('mahasiswa.index');
    }

    function viewPeminjaman()
    {
        $pinjam = Peminjaman::latest()->get();
        return view('mahasiswa.peminjaman.index_peminjaman', compact('pinjam'));
    }

    function CreatePeminjamanMahasiswa()
    {
        $ruangan = Ruangan::where(['status' => 'Tersedia', 'status_level' => 'Mahasiswa'])->get();
        return view('mahasiswa.peminjaman.create_peminjaman', compact('ruangan'));
    }

    function CreatePeminjamanMahasiswaPOST(Request $request)
    {
        $validateData = $this->validate($request, [
            'nama_peminjam' => 'required',
            'jurusan' => 'required',
            'ruangan_id' => 'required',
            'keperluan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
        ]);

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
            Ruangan::where('id', $validateData['ruangan_id'])->update(['status' => 'Tidak Tersedia']);
        }
        return redirect()->route('DashboardPeminjamanMahasiswa')->with(['Success' => 'Data berhasil disimpan !']);
    }

    public function UpdatePeminjamanMahasiswa(string $id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        $ruangan = Ruangan::where(['status' => 'Tidak Tersedia', 'status_level' => 'Mahasiswa'])->get();

        return view('mahasiswa.peminjaman.update_peminjaman', compact('peminjaman', 'ruangan'));
    }

    public function UpdatePeminjamanMahasiswaPUT(Request $request, string $id)
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

        return redirect()->route('DashboardPeminjamanMahasiswa')->with(['Success' => 'Data berhasil diubah !']);
    }

    public function showDetailPeminjamanMahasiswa(string $id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        // dd($peminjaman);
        return view('mahasiswa.peminjaman.show_peminjaman', compact('peminjaman'));
    }

    public function destroyPeminjaman(string $id)
    {

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('DashboardPeminjamanMahasiswa')->with(['Success' => 'Peminjaman Berhasil Dihapus!']);
    }

    function viewProfile()
    {
        $mahasiswa = Mahasiswa::latest()->first();

        return view('mahasiswa.profile.index_profile', compact('mahasiswa'));
    }

    function viewProfileUpdate($id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        return view('mahasiswa.profile.update_profile', compact('mahasiswa'));
    }

    public function updateProfilePost(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hasName());

            Storage::delete('public/images' . $mahasiswa->foto);

            $mahasiswa->update([
                'foto' => $image->hasName(),
                'name' => $request->name,
                'nim' => $request->nim,
                'jenis_kelamin' => $request->jenis_kelamin,

            ]);
        } else {
            $mahasiswa->update([
                'name' => $request->name,
                'nim' => $request->nim,
                'jenis_kelamin' => $request->jenis_kelamin,
            ]);
        }

        return redirect()->route('')->with(['Success' => 'Profile Berhasil Diubah!']);
    }

    public function ChangePassword(string $id)
    {
        $user = Mahasiswa::where('id', $id)->first();
        return view('mahasiswa.profile.change_password', compact('user'));
    }

    public function ChangePasswordPUT(Request $request, string $id)
    {
        if (!Hash::check($request->old_password, Auth::guard('mahasiswa')->user()->password)) {
            return back()->with('error', 'Password lama tidak sesuai');
        }
        if ($request->new_password != $request->repeat_password) {
            return back()->with('error', 'Password baru dan password verifikasi tidak sama');
        }

        $user = Mahasiswa::findOrFail($id);

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('ProfileMahasiswa')->with('Success', 'Password Berhasil Diubah');
    }
}
