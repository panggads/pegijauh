<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DestinasiController;
use App\Http\Controllers\DestinasiGaleriController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\WelcomeController;
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
Route::get('/', [WelcomeController::class, 'index'])->name('/');
Route::get('/destinations', [WelcomeController::class, 'destinasi'])->name('destinations');
Route::get('/gallerys', [WelcomeController::class, 'galeri'])->name('gallerys');
Route::get('/about', [WelcomeController::class, 'about'])->name('about');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::resource('/destinasi', DestinasiController::class);
Route::post('destinasi/upload', [DestinasiController::class, 'upload'])->name('destinasi.upload');

Route::resource('/galeri', DestinasiGaleriController::class);
Route::post('galeri/upload', [DestinasiGaleriController::class, 'upload'])->name('galeri.upload');
Route::post('galeri/store', [DestinasiGaleriController::class, 'store'])->name('galeri.store');

Route::resource('/team', TeamController::class);
Route::post('team/upload', [TeamController::class, 'upload'])->name('team.upload');

Route::resource('/layanan', LayananController::class);
Route::post('layanan/upload', [LayananController::class, 'upload'])->name('layanan.upload');

Route::resource('/medialain', MediaLainController::class);
Route::post('medialain/upload', [MediaLainController::class, 'upload'])->name('medialain.upload');