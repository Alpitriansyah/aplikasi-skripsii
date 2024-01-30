<?php

namespace App\Http\Controllers;

use App\Charts\ChartRuangan;
use App\Charts\RuanganUsersChart;
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
     * Dashboard Admin.
     */
    public function dashboard(ChartRuangan $chart)
    {

        $chart = $chart->build();
        $count_peminjaman = Peminjaman::count();
        $room_ready = Ruangan::where('status', 'Tersedia')->count();
        return view('admin.index', compact(['count_peminjaman', 'room_ready', 'chart']));
    }

    /**
     * Dashboard Peminjaman Admin.
     */
    public function dashboardPeminjaman()
    {
        return view('admin.peminjaman.index');
    }

    /**
     * Show Peminjaman Admin.
     */
    public function showPeminjaman()
    {
        $pinjam = Peminjaman::latest()->with('ruangan')->get();

        return view('admin.peminjaman.index_peminjaman', compact('pinjam'));
    }

    /**
     * Show Create Page Peminjaman Admin.
     */
    public function showCreatePeminjaman()
    {
        $ruangan = Ruangan::where('status', 'Tersedia')->get();
        return view('admin.peminjaman.create_peminjaman', compact('ruangan'));
    }

    /**
     * Store Data Peminjaman Admin.
     */
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
        // dd($request->all());

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
                'file_surat' => $validateData['file_surat'],
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

    /**
     * Show Update Page Peminjaman Admin.
     */
    public function edit(string $id)
    {

        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        $ruangan = Ruangan::all();

        return view('admin.peminjaman.update_peminjaman', compact('peminjaman', 'ruangan'));
    }

    /**
     * Show Detail Peminjaman Admin.
     */
    public function showDetailPeminjaman(string $id)
    {
        $peminjaman = Peminjaman::where('id', $id)->with('ruangan')->first();
        // dd($peminjaman);
        return view('admin.peminjaman.show_peminjaman', compact('peminjaman'));
    }

    /**
     * Update Peminjaman Page Admin
     */
    public function updatePeminjaman(Request $request, string $id)
    {
        $validateData = $this->validate($request, [
            'nama_peminjam' => 'required',
            'ruangan_id' => 'required',
            'keperluan' => 'required',
            'tanggal_mulai' => 'required',
            'tanggal_selesai' => 'required',
            'deskripsi' => 'required',
            'status' => 'required',
            'message' => 'sometimes|required'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $updateRuangan = Ruangan::whereHas('peminjaman', function ($query) use ($id) {
            $query->where('id', $id);
        })->first()->update([
            'status' => 'Tersedia',
        ]);

        if ($validateData['status'] == 'Ditolak') {
            Ruangan::whereHas('peminjaman', function ($query) use ($id) {
                $query->where('id', $id);
            })->first()->update([
                'status' => 'Tersedia',
            ]);
        }

        $peminjaman->update($validateData);


        Ruangan::where('id', $validateData['ruangan_id'])->update([
            'status' => 'Tidak Tersedia'
        ]);

        return redirect()->route('DashboardPeminjamanAdmin')->with(['Success' => 'Data berhasil diubah !']);
    }

    /**
     * Destroy Peminjaman Admin.
     */
    public function destroyPeminjaman(string $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $updateRuangan = Ruangan::whereHas('peminjaman', function ($query) use ($id) {
            $query->where('id', $id);
        })->first()->update([
            'status' => 'Tersedia',
        ]);
        $peminjaman->delete();

        return redirect()->route('DashboardPeminjamanAdmin')->with(['success' => 'Peminjaman Berhasil Dihapus!']);
    }

    /**
     * Dashboard Ruangan Admin
     */
    public function dashboardRuangan()
    {
        return view('admin.ruangan.index_ruangan');
    }

    /**
     * Show Ruangan Admin.
     */
    public function showRuangan()
    {
        $ruangan = Ruangan::latest()->get();

        return view('admin.ruangan.index_ruangan', compact('ruangan'));
    }

    /**
     * Store Create Ruangan Admin.
     */
    public function storeCreateRuanganPost(Request $request)
    {
        // dd($request->all());
        $validateData = $this->validate($request, [
            'nama_ruangan' => 'required',
            'lokasi' => 'required',
            'kapasitas' => 'required',
            'status_level' => 'required',
            'status' => 'required',
            'image_ruangan' => 'required|image|mimes:jpg,jpeg,png',
        ]);

        if ($request->hasFile('image_ruangan')) {
            $destination_path = 'images/ruangan';
            $image = $request->file('image_ruangan');
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $image_extension = $image->getClientOriginalExtension();
            $fileNameToStore = $image_name . '-' . time() . '.' . $image_extension;
            $fileStore = $image->storeAs($destination_path, $fileNameToStore, 'public');
            $validateData['image_ruangan'] = $fileStore;
        }

        Ruangan::create([
            'name' => $validateData['nama_ruangan'],
            'lokasi' => $validateData['lokasi'],
            'kapasitas' => $validateData['kapasitas'],
            'status_level' => $validateData['status_level'],
            'status' => $validateData['status'],
            'foto' => $validateData['image_ruangan']
        ]);


        return redirect()->route('DashboardRuangan')->with(['Success' => 'Data berhasil disimpan !']);
    }

    /**
     * Create Ruangan Page Admin.
     */
    public function showCreateRuangan()
    {
        return view('admin.ruangan.create_ruangan');
    }

    /**
     * Show Detail Ruangan Admin.
     */
    public function ShowDetailRuangan(string $id)
    {
        $ruang = Ruangan::where('id', $id)->first();
        return view('admin.ruangan.show_ruangan', compact('ruang'));
    }

    /**
     * Update Ruangan Page Admin.
     */
    public function updateRuanganDetail(string $id)
    {
        $ruang = Ruangan::where('id', $id)->first();
        return view('admin.ruangan.update_ruangan', compact('ruang'));
    }

    /**
     * Store Ruangan Admin.
     */
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

    /**
     * Destroy Ruangan Admin.
     */
    public function destroyRuangan(string $id)
    {
        $ruang = Ruangan::findOrFail($id);
        $ruang->delete();

        return redirect()->route('DashboardRuangan')->with(['Success' => 'Data Ruangan Berhasil Dihapus!']);
    }

    /**
     * Dashboard User Admin.
     */
    public function DashboardUser()
    {
        $user = User::latest()->get();
        return view('admin.user.index_user', compact('user'));
    }

    /**
     * Create User Page Admin.
     */
    public function CreateUser()
    {
        return view('admin.user.create_user');
    }

    public function StoreUser(Request $request)
    {
        $validateData = $this->validate($request, [
            'nama_user' => 'required',
            'user_email' => 'required|email',
            'password_user' => 'required',
            'jenisKelamin' => 'required',
            'image_user' => 'nullable|image|mimes:jpeg,jpg,png'
        ]);

        if ($request->hasFile('image_user')) {
            $destination_path = 'images/profile';
            $image = $request->file('image_user');
            $image_name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
            $image_extension = $image->getClientOriginalExtension();
            $fileNameToStore = $image_name . '-' . time() . '.' . $image_extension;
            $fileStore = $image->storeAs($destination_path, $fileNameToStore, 'public');
            $validateData['image_user'] = $fileStore;
        }

        User::create([
            'name' => $validateData['nama_user'],
            'email' => $validateData['user_email'],
            'password' => Hash::make($validateData['password_user']),
            'jenis_kelamin' => $validateData['jenisKelamin'],
            'foto' => $validateData['image_user'],
            'level' => 'admin'

        ]);

        return redirect()->route('DashboardUser')->with(['Success' => 'Data berhasil Disimpan !']);
    }

    /**
     * Update User Page Admin.
     */
    public function ShowUpdateUser()
    {
        return view('admin.user.update_user');
    }

    /**
     * Show Detail User Admin.
     */
    public function ShowDetailUser()
    {
        return view('admin.user.show_user');
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



    /**
     * Show Profile Admin.
     */
    public function showProfileAdmin()
    {
        $user = User::query()->where('id', auth()->id())->first();

        return view('admin.profile.index_profile', compact('user'));
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
            'image' => 'nullable|mimes:png,jpg|image',
        ]);

        if ($request->hasFile('image')) {
            $destination_path = 'public/images/profile';
            $image = $request->file('image');
            $image_name = $image->getClientOriginalName();
            $path = $request->file('image')->storeAs($destination_path, $image_name);
            $validateData['image'] = $image_name;
        }

        $profile = User::findOrFail($id);

        $profile->update([
            'name' => $validateData['nama'],
            'email' => $validateData['email'],
            'jenis_kelamin' => $validateData['jenis_kelamin'],
            'foto' => $validateData['image'],
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
}
