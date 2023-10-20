<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BilanganController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', fn() => view('tugas'));

Route::get('/captchamath', [ContactController::class, 'index'] );
Route::post('/captchamath-proses',[ContactController::class, 'contactin'] );
Route::post('/captchamath-edit/{contact}',[ContactController::class, 'contactEdit'] );
Route::get('/captchamath-hapus/{contact}',[ContactController::class, 'contactHapus'] );

Route::get('/soalkeduaa', fn() => view('soalkedua') );

Route::get('/ppdb', [PpdbController::class, 'index'] );
Route::post('/ppdb-tambah', [PpdbController::class, 'tambah'] );
Route::post('/ppdb-edit/{ppdb}', [PpdbController::class, 'edit'] );
Route::get('/ppdb-hapus/{ppdb}', [PpdbController::class, 'hapus'] );

Route::get('/bilanganterkecill', [BilanganController::class, 'index'] );
Route::post('/bilanganterkecill/proses', [BilanganController::class, 'hitung'] );