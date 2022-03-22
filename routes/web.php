<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cProposal;
use App\Http\Controllers\TmahasiwaController;
use App\Http\Controllers\TlokasiController;
use App\Http\Controllers\TkompetisiController;
use App\Http\Controllers\TprodiController;
use App\Http\Controllers\TdosenController;
use App\Http\Controllers\TgroupController;
use App\Http\Controllers\TkompetisigroupController;

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


Route::get('/',[cProposal::class, 'Index'] )->name('index.proposal');
Route::get('/proposal/add',[cProposal::class, 'add'] )->name('add.proposal');
Route::post('/proposal/add',[cProposal::class, 'store'] )->name('store.proposal');
Route::get('/proposal/tampilan',[cProposal::class, 'tampilan'] )->name('tampilan.proposal');

// Mahasiswa
Route::get('/mahasiswa', [TmahasiwaController::class, 'index'])->name('index.mahasiswa');
Route::post('/data_mahasiswa', [TmahasiwaController::class, 'data'])->name('data.mahasiswa');
Route::post('/addmahasiswa', [TmahasiwaController::class, 'add'])->name('add.mahasiswa');
Route::get('/detailmahasiswa', [TmahasiwaController::class, 'single'])->name('single.mahasiswa');
Route::get('/deletemahasiswa', [TmahasiwaController::class, 'delete'])->name('delete.mahasiswa');

// Lokasi
Route::get('/lokasi', [TlokasiController::class, 'index'])->name('index.lokasi');
Route::post('/data_lokasi', [TlokasiController::class, 'data'])->name('data.lokasi');
Route::post('/addlokasi', [TlokasiController::class, 'add'])->name('add.lokasi');
Route::get('/detaillokasi', [TlokasiController::class, 'single'])->name('single.lokasi');
Route::get('/deletelokasi', [TlokasiController::class, 'delete'])->name('delete.lokasi');

// Kompetisi
Route::get('/kompetisi', [TkompetisiController::class, 'index'])->name('index.kompetisi');
Route::post('/data_kompetisi', [TkompetisiController::class, 'data'])->name('data.kompetisi');
Route::post('/addkompetisi', [TkompetisiController::class, 'add'])->name('add.kompetisi');
Route::get('/detailkompetisi', [TkompetisiController::class, 'single'])->name('single.kompetisi');
Route::get('/deletekompetisi', [TkompetisiController::class, 'delete'])->name('delete.kompetisi');

// Prodi
Route::get('/prodi', [TprodiController::class, 'index'])->name('index.prodi');
Route::post('/data_prodi', [TprodiController::class, 'data'])->name('data.prodi');
Route::post('/addprodi', [TprodiController::class, 'add'])->name('add.prodi');
Route::get('/detailprodi', [TprodiController::class, 'single'])->name('single.prodi');
Route::get('/deleteprodi', [TprodiController::class, 'delete'])->name('delete.prodi');

// Dosen
Route::get('/dosen', [TdosenController::class, 'index'])->name('index.dosen');
Route::post('/data_dosen', [TdosenController::class, 'data'])->name('data.dosen');
Route::post('/adddosen', [TdosenController::class, 'add'])->name('add.dosen');
Route::get('/detaildosen', [TdosenController::class, 'single'])->name('single.dosen');
Route::get('/deletedosen', [TdosenController::class, 'delete'])->name('delete.dosen');

// Group
Route::get('/group', [TgroupController::class, 'index'])->name('index.group');
Route::post('/data_group', [TgroupController::class, 'data'])->name('data.group');
Route::post('/addgroup', [TgroupController::class, 'add'])->name('add.group');
Route::get('/detailgroup', [TgroupController::class, 'single'])->name('single.group');
Route::get('/deletegroup', [TgroupController::class, 'delete'])->name('delete.group');

// Kompetisi_Group
Route::get('/kompetisigroup', [TkompetisigroupController::class, 'index'])->name('index.kompetisigroup');
Route::post('/data_komepetisigroup', [TkompetisigroupController::class, 'data'])->name('data.kompetisigroup');
Route::post('/addkompetisigroup', [TkompetisigroupController::class, 'add'])->name('add.kompetisigroup');
Route::get('/detailkompetisigroup', [TkompetisigroupController::class, 'single'])->name('single.kompetisigroup');
Route::get('/deletekompetisigroup', [TkompetisigroupController::class, 'delete'])->name('delete.kompetisigroup');