<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    function view_admin(){
        return view('auth.login_admin');
    }

    function view_mahasiswa(){
        return view('auth.login_mahasiswa');
    }

    function view_dosen(){
        return view('auth.login_dosen');
    }

    function login_admin(Request $request){
        $request->validate([
           'email' => ['required','email'],
           'password' => ['required'],
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::guard('user')->attempt($credentials)){
            return redirect()->route('DashboardAdmin');
        } else {
            return back()->withErrors([
                'email' => 'Email/Password Salah',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Email tidak terdaftar',
            'password' => 'Password salah'
        ])->onlyInput('email','passsword');
    }

    function login_mahasiswa(Request $request){
        $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::guard('mahasiswa')->attempt(['nim'=>$request->nim, 'password'=>$request->password])){
            return redirect()->route('DashboardMahasiswa');
        } else {
            return back()->withErrors([
                'nim' => 'Nim tidak terdaftar',
            ])->onlyInput('nim','password');
        }

        return back()->withErrors([
            'nim' => 'Nim tidak terdaftar',
        ])->onlyInput('nim','password');
    }

    function login_dosen(Request $request){
        $request->validate([
            'nip' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::guard('dosen')->attempt(['nip'=>$request->nip, 'password'=>$request->password])){
            return redirect()->route('DashboardDosen');
        } else {
            return redirect('/');
        }

        return back()->withErrors([
            'nip' => 'Nim tidak terdaftar',
            'password' => 'Password salah'
        ])->onlyInput('nim','password');
    }

    function logout(Request $request)
    {
        if(Auth::guard('user')->check()){
            Auth::guard('user')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $request->session()->flush();
        } elseif(Auth::guard('mahasiswa')->check()){
            Auth::guard('mahasiswa')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $request->session()->flush();
        } elseif(Auth::guard('dosen')->check()){
            Auth::guard('dosen')->logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            $request->session()->flush();
        }

        return redirect('/')->with('alert', 'Anda Telah Logout');
    }
}
