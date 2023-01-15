<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

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

Route::get('/', [LoginController::class, 'login'])->name('login');

    Route::get('/siswa', [SiswaController::class, 'siswa'])->name('siswa');
    Route::post('/insertsiswa', [SiswaController::class, 'insertsiswa'])->name('insertsiswa');
    Route::post('/updatasiswa/{id}', [SiswaController::class, 'updatasiswa'])->name('updatasiswa');
    Route::get('/deletesiswa/{id}', [SiswaController::class, 'deletesiswa'])->name('deletesiswa');
