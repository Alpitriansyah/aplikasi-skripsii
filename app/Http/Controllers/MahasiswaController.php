<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MahasiswaController extends Controller
{
    function dashboard(){
        return view('mahasiswa.index');
    }

    function viewPeminjaman(){
        return view('admin.peminjaman');
    }

    function viewProfile(){
        $mahasiswa = Mahasiswa::latest()->first();

        return view('mahasiswa.profile', compact('mahasiswa'));
    }

    function viewProfileUpdate($id){
        $mahasiswa = Mahasiswa::where('id', $id)->first();

        return view('mahasiswa.profileEdit', compact('mahasiswa'));
    }

    public function updateProfile(Request $request, $id) {
        $this->validate($request, [
            'name' => 'required',
            'nim' => 'required',
            'jenis_kelamin' => 'required',
            'foto' => 'image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        if ($request->hasFile('foto')){
            $image = $request->file('foto');
            $image->storeAs('public/images', $image->hasName());

            Storage::delete('public/images'.$mahasiswa->foto);

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

        return redirect()->route('')->with(['success' => 'Profile Berhasil Diubah!']);
    }

}
