<?php

use App\Http\Controllers\DataController;
use App\Models\Data;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;





Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [DataController::class, 'index']) -> name ('data');

Route::get('/detail/{id}', [DataController::class, 'show']) -> name ('detail');

Route::get('/data/index', [DataController::class, 'superadminindex'])->name('data.superadminindex')->middleware('auth');


Route::get('/data/create', [DataController::class, 'create'])->name('data.create')->middleware('auth');
Route::get('/data/{id}/edit', [DataController::class, 'edit'])->name('data.edit')->middleware('auth');
Route::put('/data/{id}', [DataController::class, 'update'])->name('data.update')->middleware('auth');
Route::post('/data', [DataController::class, 'store'])->name('data.store')->middleware('auth');

Route::delete('/data/{id}', [DataController::class, 'destroy'])->name('data.destroy')->middleware('auth');

// Route untuk menampilkan daftar pengguna
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware(['auth', 'superadmin']);

// Route untuk menampilkan form tambah pengguna
Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware(['auth', 'superadmin']);

// Route untuk menyimpan pengguna baru
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware(['auth', 'superadmin']);

// Route untuk menampilkan form edit pengguna
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware(['auth']);

// Route untuk mengupdate pengguna
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware(['auth']);

// Route untuk menghapus pengguna
Route::delete('/users/{user}', [UserController::class, 'delete'])->name('users.delete')->middleware(['auth', 'superadmin']);

// Rute untuk menampilkan detail user
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show')->middleware(['auth']);

// Rute menampilkan profile
Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show')->middleware(['auth']);
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware(['auth']);

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/superadmin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('superadmin.home')->middleware('auth');

