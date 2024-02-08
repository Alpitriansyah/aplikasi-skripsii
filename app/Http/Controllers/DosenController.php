<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Peminjaman;
use App\Models\Ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DosenController extends Controller
{
    function DashboardDosen()
    {
        return view('dosen.index');
    }

    function viewPeminjamanDosen()
    {
        $pinjam = Peminjaman::latest()->get();
        return view('dosen.peminjaman.index_peminjaman', compact('pinjam'));
    }

    function CreatePeminjamanDosen()
    {
        $dosen = Dosen::query()->where('id', auth()->id())->first();
        $ruangan = Ruangan::where('status', 'Tersedia')->orWhere(function ($query) {
            $query->where('status_level', 'Dosen')
                ->where('status_level', 'Mahasiswa & Dosen');
        })->get();
        return view('dosen.peminjaman.create_peminjaman', compact(['ruangan', 'dosen']));
    }

    function CreatePeminjamanDosenPOST(Request $request)
    {
        $validateData = $this->validate($request, [
            'nama_peminjam' => 'required',
            'jurusan' => 'required',
            'ruangan_id' => 'required',
            'keperluan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
            'file_surat' => 'required|file|mimes:pdf|max:3000',
        ]);

        if ($request->hasFile('file_surat')) {
            $destination_path = 'berkas/surat-kegiatan';
            $surat = $request->file('file_surat');
            $surat_name = pathinfo($surat->getClientOriginalName(), PATHINFO_FILENAME);
            $surat_extension = $surat->getClientOriginalExtension();
            $fileNameToStore = $surat_name . '-' . time() . '.' . $surat_extension;
            $fileStore = $surat->storeAs($destination_path, $fileNameToStore, 'public');
            $validateData['file_surat'] = $fileStore;
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
                'status' => 'Diproses',
                'file_surat' => $validateData['file_surat'],
            ]);
            Ruangan::where('id', $validateData['ruangan_id'])->update(['status' => 'Tidak Tersedia']);
        }
        return redirect()->route('DashboardPeminjamanDosen')->with(['Success' => 'Data berhasil disimpan !']);
    }

    public function UpdatePeminjamanDosen(string $id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        $ruangan = Ruangan::where(['status' => 'Tidak Tersedia', 'status_level' => 'Dosen'])->get();

        return view('dosen.peminjaman.update_peminjaman', compact('peminjaman', 'ruangan'));
    }

    public function UpdatePeminjamanDosenPUT(Request $request, string $id)
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

        return redirect()->route('DashboardPeminjamanDosen')->with(['Success' => 'Data berhasil diubah !']);
    }

    public function showDetailPeminjamanDosen(string $id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        // dd($peminjaman);
        return view('dosen.peminjaman.show_peminjaman', compact('peminjaman'));
    }

    public function destroyPeminjaman(string $id)
    {

        $peminjaman = Peminjaman::findOrFail($id);
        $peminjaman->delete();

        return redirect()->route('DashboardPeminjamanDosen')->with(['Success' => 'Peminjaman Berhasil Dihapus!']);
    }

    function viewProfile()
    {
        $mahasiswa = Dosen::latest()->first();

        return view('dosen.profile.index_profile', compact('mahasiswa'));
    }

    function viewProfileUpdate($id)
    {
        $mahasiswa = Dosen::where('id', $id)->first();

        return view('dosen.profile.update_profile', compact('mahasiswa'));
    }

    public function updateProfilePost(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $mahasiswa = Dosen::findOrFail($id);

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
        $user = Dosen::where('id', $id)->first();
        return view('dosen.profile.change_password', compact('user'));
    }

    public function ChangePasswordPUT(Request $request, string $id)
    {
        if (!Hash::check($request->old_password, Auth::guard('dosen')->user()->password)) {
            return back()->with('error', 'Password lama tidak sesuai');
        }
        if ($request->new_password != $request->repeat_password) {
            return back()->with('error', 'Password baru dan password verifikasi tidak sama');
        }

        $user = Dosen::findOrFail($id);

        $user->update([
            'password' => Hash::make($request->new_password)
        ]);

        return redirect()->route('ProfileDosen')->with('Success', 'Password Berhasil Diubah');
    }
}
