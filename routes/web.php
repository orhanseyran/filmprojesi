<?php

use App\Http\Controllers\VeriEkleController;
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

Route::get("/",[VeriEkleController::class,"index"])->name("index");
Route::get("/kategori",[VeriEkleController::class,"kategori"])->name("kategori");

Route::post('/filmekle', [VeriEkleController::class, 'filmekle'])->name('filmekle');

// Film düzenleme
Route::post('/filmdüzenle/{id}', [VeriEkleController::class, 'filmdüzenle'])->name('filmdüzenle');

// Kategori ekleme
Route::post('/kategoriekle', [VeriEkleController::class, 'kategoriekle'])->name('kategoriekle');

// Kategori düzenleme
Route::post('/kategoridüzenle/{id}', [VeriEkleController::class, 'kategoridüzenle'])->name('kategoridüzenle');
Route::get('/kategoridelete/{id}', [VeriEkleController::class, 'kategoridelete'])->name('kategoridelete');
Route::get('/filmdelete/{id}', [VeriEkleController::class, 'filmdelete'])->name('filmdelete');