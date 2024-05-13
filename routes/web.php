<?php

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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('daftarKategori');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('daftarMenu');

Route::get('/kategori/create', [App\Http\Controllers\KategoriController::class, 'create'])->name('createKategori');
Route::post('/kategori/create', [App\Http\Controllers\KategoriController::class, 'store'])->name('storeKategori');

Route::get('/kategori/{id}/edit', [App\Http\Controllers\KategoriController::class, 'edit'])->name('editKategori');
Route::post('/kategori/{id}/edit', [App\Http\Controllers\KategoriController::class, 'update'])->name('updateKategori');

Route::get('/menu/create', [App\Http\Controllers\MenuController::class, 'create'])->name('createMenu');
Route::post('/menu/create', [App\Http\Controllers\MenuController::class, 'store'])->name('storeMenu');

Route::get('/menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'edit'])->name('editMenu');
Route::post('/menu/{id}/edit', [App\Http\Controllers\MenuController::class, 'update'])->name('updateMenu');

Route::get('/kategori/{id}/delete', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('deleteKategori');
Route::get('/menu/{id}/delete', [App\Http\Controllers\MenuController::class, 'destroy'])->name('deleteMenu');

