<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuegoController;
use App\Http\Controllers\ProductoController;

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

/* Route::get('/juego', function () {
    return view('juego.index');
});

Route::get('juego/create',[JuegoController::class,'create']);
*/

Route::resource('juego',JuegoController::class)->middleware('auth');
Route::resource('producto',ProductoController::class)->middleware('auth');


Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [JuegoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/', [JuegoController::class, 'index'])->name('home');
});

Route::get('/home', [ProductoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'], function() {
    Route::get('/', [ProductoController::class, 'index'])->name('home');
});