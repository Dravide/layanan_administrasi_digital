<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KlasifikasisController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PengaturanSuratController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\SuratsController;
use App\Http\Controllers\TemplatesController;
use App\Http\Controllers\TteController;
use App\Http\Controllers\ValidasisController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return redirect()->route('home');
    });
    Route::get('/home', HomeController::class)->name('home');

    Route::resource('klasifikasi', KlasifikasisController::class);

// Cetak PDF
    Route::get('/cetak', [CetakController::class, 'cetak'])->name('cetak.pdf');

// Pengaturan Surat
    Route::get('/pengaturansurat/header', [PengaturanSuratController::class, 'header'])->name('header');
    Route::post('/pengaturansurat/header', [PengaturanSuratController::class, 'headerstore'])->name('header.store');
    Route::get('/pengaturansurat/footer', [PengaturanSuratController::class, 'footer'])->name('footer');
    Route::post('/pengaturansurat/footer', [PengaturanSuratController::class, 'footerstore'])->name('footer.store');
    Route::get('/pengaturansurat/template', [PengaturanSuratController::class, 'template'])->name('template');

// Template Surat
    Route::resource('/templatesurat', TemplatesController::class);
    Route::patch('/templatesurat/status/{templatesurat}', [TemplatesController::class, 'status'])->name('status');
    Route::get('/templatesurat/status/arsip', [TemplatesController::class, 'arsip'])->name('arsip');

// Surat
    Route::get('/surat/buat/{surat}', [SuratsController::class, 'index'])->name('surat.index');
    Route::post('/surat', [SuratsController::class, 'store'])->name('surat.store');
    Route::get('/surat/keluar', [SuratsController::class, 'keluar'])->name('surat.keluar');
    Route::post('/surat/generate', [SuratsController::class, 'generate'])->name('surat.generate');
    Route::get('/surat/edit/{surat}', [SuratsController::class, 'edit'])->name('surat.edit');

    Route::get('/clear-cache', function () {
        $exitCode = Artisan::call('config:clear');
        $exitCode = Artisan::call('cache:clear');
        $exitCode = Artisan::call('config:cache');
        return 'DONE'; //Return anything
    });

// TTE
    Route::get('/tte/{url}', [TteController::class, 'index'])->name('tte.index');
    Route::post('/tte/store/{id}', [TteController::class, 'store'])->name('tte.store');

// Validasi
    Route::get('/validasi/{url}', [ValidasisController::class, '__invoke'])->name('validasi');

// Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');

    // Guru
    Route::get('/guru', [GuruController::class, 'index'])->name('guru.index');

    // Pengaturan
    Route::get('/pengaturan', [PengaturanController::class, 'index'])->name('pengaturan.index');
});
// Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
