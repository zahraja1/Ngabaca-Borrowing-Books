<?php

use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\BukuApiController;
use App\Http\Controllers\Api\PeminjamanApiController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\UlasanApiController;
use App\Http\Controllers\BukuApiController as ControllersBukuApiController;
use App\Http\Controllers\CustomerApiController;
use Illuminate\Http\Request;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::controller(BukuApiController::class)->group(function(){
    Route::get('/buku', 'index');
    Route::get('/buku/detail/{id}', 'detail');
    Route::post('/buku/tambah', 'tambah');
    Route::delete('/buku/hapus/{id}', 'hapus');
    Route::put('/buku/update/{id}', 'update');
});
 Route::controller(UlasanApiController::class)->group(function(){
    Route::get('/ulasan', 'index');
    Route::get('/ulasan/detail', 'detail');
    Route::post('/ulasan/tambah', 'tambah');
    Route::delete('/ulasan/hapus/{id}', 'hapus');
    Route::put('/ulasan/update/{id}', 'update');
 });

 Route::controller(PeminjamanApiController::class)->group(function(){
    Route::get('/peminjaman', 'index');
    Route::get('/peminjaman/detail', 'detail');
    Route::post('/peminjaman/tambah', 'tambah');
    Route::delete('/peminjaman/hapus/{id}', 'hapus');
    Route::put('/peminjaman/update/{id}', 'update');
 });
Route::controller(AuthApiController::class)->group(function(){
    Route::post('/register', RegisterController::class)->name('register');
    Route::post('/login', 'login');
});
