<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamBukuController;
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
    return view('welcome');
});

Route::get('/buku', [BukuController::class, 'index'])->name('buku');
Route::post('/buku/add', [BukuController::class, 'postAdd'])->name('buku.add.post');
Route::get('/buku/edit/{buku_id}', [BukuController::class, 'getEdit'])->name('buku.edit.get');
Route::post('/buku/edit', [BukuController::class, 'postEdit'])->name('buku.edit.post');
Route::get('/buku/delete/{buku_id}', [BukuController::class, 'getDelete'])->name('buku.delete.get');

Route::get('/pinjam/buku', [PinjamBukuController::class, 'index'])->name('pinjam.buku');
Route::post('/pinjam/buku/add', [PinjamBukuController::class, 'postAdd'])->name('pinjam.buku.add');
Route::get('/pinjam/buku/edit/{pinjam_id}', [PinjamBukuController::class, 'getEdit'])->name('pinjam.buku.edit.get');
Route::post('/pinjam/buku/edit', [PinjamBukuController::class, 'postEdit'])->name('pinjam.buku.edit.post');
Route::get('/pinjam/buku/delete/{pinjam_id}', [PinjamBukuController::class, 'getDelete'])->name('pinjam.buku.delete.get');
