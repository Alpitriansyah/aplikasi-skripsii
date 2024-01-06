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
    Route::get('/admin/profile/{id}', [AdminController::class, 'UpdateProfile'])->name('UpdateProfileAdmin');
    Route::put('/admin/profile/{id}', [AdminController::class, 'UpdateProfilePUT'])->name('UpdateProfileAdminPUT');
    Route::get('/admin/profile/change/{id}', [AdminController::class, 'ChangePassword'])->name('ChangePasswordAdmin');
    Route::put('/admin/profile/change/{id}', [AdminController::class, 'ChangePasswordPUT'])->name('ChangePasswordAdminPUT');
    Route::get('/admin/ruangan', [AdminController::class, 'showRuangan'])->name('DashboardRuangan');
    Route::get('/admin/ruangan/create', [AdminController::class, 'showCreateRuangan'])->name('AdminCreateRuangan');
    Route::post('/admin/ruangan/create', [AdminController::class, 'storeCreateRuanganPost'])->name('AdminCreateRuanganPost');
    Route::get('/admin/ruangan/detail/{id}', [AdminController::class, 'ShowDetailRuangan'])->name('AdminShowDetailRuagan');
    Route::get('/admin/user', [AdminController::class, 'DashboardUser'])->name('DashboardUser');
    Route::get('/admin/user/create', [AdminController::class, 'CreateUser'])->name('AdminCreateUser');
    Route::get('/admin/ruangan/{id}', [AdminController::class, 'updateRuanganDetail'])->name('AdminUpdateRuangan');
    Route::put('/admin/ruangan/{id}', [AdminController::class, 'updateRuangan'])->name('AdminUpdateRuanganPut');
    Route::delete('/admin/ruangan/{id}', [AdminController::class, 'destroyRuangan'])->name('AdminDeleteRuangan');
    Route::get('/admin/peminjaman/create', [AdminController::class, 'showCreatePeminjaman'])->name('AdminCreatePeminjaman');
    Route::post('/admin/peminjaman/create', [AdminController::class, 'storeCreatePeminjamanPost'])->name('AdminCreatePeminjamanPost');
    Route::delete('/admin/peminjaman/{id}', [AdminController::class, 'destroyPeminjaman'])->name('AdminDeletePeminjaman');
    Route::get('/admin/peminjaman/{id}', [AdminController::class, 'edit'])->name('AdminShowPeminjamanPost');
    Route::get('/admin/peminjaman/detail/{id}', [AdminController::class, 'showDetailPeminjaman'])->name('AdminShowDetailPeminjaman');
    Route::put('/admin/peminjaman/{id}', [AdminController::class, 'updatePeminjaman'])->name('AdminUpdatePeminjamanPost');
    Route::get('/admin/mahasiswa', [AdminController::class, 'DashboardMahasiswa'])->name('AdminDashboardMahasiswa');
    Route::get('/admin/mahasiswa/create', [AdminController::class, 'CreateMahasiswa'])->name('AdminCreateMahasiswa');
    Route::post('/admin/mahasiswa/create', [AdminController::class, 'CreateMahasiswaPost'])->name('AdminCreateMahasiswaPOST');
    Route::get('/admin/mahasiswa/detail/{id}', [AdminController::class, 'ShowMahasiswa'])->name('AdminShowDetailMahasiswa');
    Route::get('/admin/mahasiswa/{id}', [AdminController::class, 'ShowUpdateMahasiswa'])->name('AdminUpdateMahasiswa');
    Route::put('/admin/mahasiswa/{id}', [AdminController::class, 'ShowUpdateMahasiswaPost'])->name('AdminUpdateMahasiswaPUT');
    Route::get('/admin/dosen', [AdminController::class, 'DashboardDosen'])->name('AdminDashboardDosen');
    Route::get('/admin/dosen/create', [AdminController::class, 'CreateDosen'])->name('AdminCreateDosen');
    Route::post('/admin/dosen/create', [AdminController::class, 'CreateDosenPost'])->name('AdminCreateDosenPOST');
    Route::get('/admin/dosen/detail/{id}', [AdminController::class, 'ShowDosen'])->name('AdminShowDetailDosen');
    Route::get('/admin/dosen/{id}', [AdminController::class, 'ShowUpdateDosen'])->name('AdminUpdateDosen');
    Route::put('/admin/dosen/{id}', [AdminController::class, 'ShowUpdateMDosenPut'])->name('AdminUpdateDosenPUT');
});

Route::group(['middleware' => ['auth:dosen', 'checklevel:dosen']], function () {
    Route::get('/dosen', [DosenController::class, 'dashboard'])->name('DashboardDosen');
    Route::get('/dosen/peminjaman', [DosenController::class, 'index'])->name('DashboardPeminjamanDosen');
    Route::get('/dosen/peminjaman/create', [DosenController::class, 'viewPeminjaman'])->name('CreatePeminjamanDosen');
    Route::post('/dosen/peminjaman/create', [DosenController::class, 'viewPeminjaman'])->name('CreatePeminjamanDosenPOST');
    Route::get('/dosen/peminjaman/{id}', [DosenController::class, 'viewPeminjaman'])->name('UpdatePeminjamanDosen');
    Route::put('/dosen/peminjaman/{id}', [DosenController::class, 'viewPeminjaman'])->name('UpdatePeminjamanDosenPUT');
    Route::delete('/dosen/peminjaman/{id}', [DosenController::class, 'viewPeminjaman'])->name('DeletePeminjamanDosen');
    Route::get('/dosen/peminjaman/detail/{id}', [DosenController::class, 'ShowDosen'])->name('DetailPeminjamanDosen');
    Route::get('/dosen/profile', [DosenController::class, 'index'])->name('ProfileDosen');
    Route::get('/dosen/profile/{id}', [DosenController::class, 'viewProfileUpdate'])->name('UpdateProfileDosen');
    Route::put('/dosen/profile/{id}', [DosenController::class, 'updateProfile'])->name('UpdateProfileDosenPUT');
});

Route::group(['middleware' => ['auth:mahasiswa', 'checklevel:mhs']], function () {
    Route::get('/mahasiswa', [MahasiswaController::class, 'dashboard'])->name('DashboardMahasiswa');
    Route::get('/mahasiswa/peminjaman', [MahasiswaController::class, 'viewPeminjaman'])->name('DashboardPeminjamanMahasiswa');
    Route::get('/mahasiswa/peminjaman/create', [MahasiswaController::class, 'viewPeminjaman'])->name('CreatePeminjamanMahasiswa');
    Route::post('/mahasiswa/peminjaman/create', [MahasiswaController::class, 'viewPeminjaman'])->name('CreatePeminjamanMahasiswaPOST');
    Route::get('/mahasiswa/peminjaman/{id}', [MahasiswaController::class, 'viewPeminjaman'])->name('UpdatePeminjamanMahasiswa');
    Route::put('/mahasiswa/peminjaman/{id}', [MahasiswaController::class, 'viewPeminjaman'])->name('UpdatePeminjamanMahasiswaPUT');
    Route::delete('/mahasiswa/peminjaman/{id}', [MahasiswaController::class, 'viewPeminjaman'])->name('HapusPeminjamanMahasiswa');
    Route::get('/mahasiswa/peminjaman/detail/{id}', [MahasiswaController::class, 'viewPeminjaman'])->name('ShowDetailPeminjamanMahasiswa');
    Route::get('/mahasiswa/profile', [MahasiswaController::class, 'viewProfile'])->name('ProfileMahasiswa');
    Route::get('/mahasiswa/profile/{id}', [MahasiswaController::class, 'viewProfileUpdate'])->name('UpdateProfileMahasiswa');
    Route::put('/mahasiswa/profile/{id}', [MahasiswaController::class, 'updateProfile'])->name('UpdateProfileMahasiswaPUT');
});
