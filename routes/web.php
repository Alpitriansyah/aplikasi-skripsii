<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
})->name('Homepage');



Route::get('/login/admin', [LoginController::class, 'view_admin'])->name('LoginAdmin');
Route::get('/login/mahasiswa', [LoginController::class, 'view_mahasiswa'])->name('LoginMahasiswa');
Route::get('/login/dosen', [LoginController::class, 'view_dosen'])->name('LoginDosen');
Route::post('/login_admin', [LoginController::class, 'login_admin'])->name('LoginSessionAdmin');
Route::post('/login_mahasiswa', [LoginController::class, 'login_mahasiswa'])->name('LoginSessionMahasiswa');
Route::post('/login_dosen', [LoginController::class, 'login_dosen'])->name('LoginSessionDosen');
Route::get('/logout', [LoginController::class, 'logout'])->name('LogoutSession');

Route::group(['middleware' => ['auth:user', 'checklevel:admin']], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('DashboardAdmin');
    Route::get('/admin/peminjaman', [AdminController::class, 'showPeminjaman'])->name('DashboardPeminjamanAdmin');
    Route::get('/admin/profile', [AdminController::class, 'showProfileAdmin'])->name('ProfileAdmin');
    Route::get('/admin/ruangan', [AdminController::class, 'showRuangan'])->name('DashboardRuangan');
    Route::get('/admin/ruangan/create', [AdminController::class, 'showCreateRuangan'])->name('AdminCreateRuangan');
    Route::post('/admin/ruangan/create', [AdminController::class, 'storeCreateRuanganPost'])->name('AdminCreateRuanganPost');
    Route::get('/admin/user', [AdminController::class, 'showUser'])->name('DashboardUser');
    Route::get('/admin/peminjaman/create', [AdminController::class, 'showCreatePeminjaman'])->name('AdminCreatePeminjaman');
    Route::post('/admin/peminjaman/create', [AdminController::class, 'storeCreatePeminjamanPost'])->name('AdminCreatePeminjamanPost');
    Route::delete('/admin/peminjaman/{id}', [AdminController::class, 'destroyPeminjaman'])->name('AdminDeletePeminjaman');
    Route::get('/admin/peminjaman/{id}', [AdminController::class, 'edit'])->name('AdminShowPeminjamanPost');
    Route::get('/admin/peminjaman/detail/{id}', [AdminController::class, 'showDetailPeminjaman'])->name('AdminShowDetailPeminjaman');
    Route::put('/admin/peminjaman/{id}', [AdminController::class, 'updatePeminjaman'])->name('AdminUpdatePeminjamanPost');
});

Route::group(['middleware' => ['auth:dosen', 'checklevel:dosen']], function () {
    Route::get('/dosen', [DosenController::class, 'dashboard'])->name('DashboardDosen');
    Route::get('/dosen/peminjaman', [DosenController::class, 'index'])->name('DashboardPeminjamanDosen');
    Route::get('/dosen/profile', [DosenController::class, 'index'])->name('ProfileDosen');
});

Route::group(['middleware' => ['auth:mahasiswa', 'checklevel:mhs']], function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'dashboard'])->name('DashboardMahasiswa');
    Route::get('/mahasiswa/peminjaman', [MahasiswaController::class, 'viewPeminjaman'])->name('DashboardPeminjamanMahasiswa');
    Route::get('/mahasiswa/profile', [MahasiswaController::class, 'viewProfile'])->name('ProfileMahasiswa');
    Route::get('/mahasiswa/profile/{id}', [MahasiswaController::class, 'viewProfileUpdate'])->name('UpdateProfileMahasiswaShow');
    Route::put('/mahasiswa/profile/{id}', [MahasiswaController::class, 'updateProfile'])->name('UpdateProfileMahasiswa');
});
