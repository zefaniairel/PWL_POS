<?php

use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\KategoriController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LevelController;
use App\Http\Controllers\Api\StokController;
use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
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

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::middleware('auth:api')->get('/user', function (Request $request){
    return $request->user();
});
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::get('levels', [LevelController::class, 'index']);
Route::post('levels', [LevelController::class, 'store']);
Route::get('levels/{level}', [LevelController::class, 'show']);
Route::put('levels/{level}', [LevelController::class, 'update']);
Route::delete('levels/{level}', [LevelController::class, 'destroy']);

Route::get('user', [UserController::class, 'index']);
Route::post('user', [UserController::class, 'store']);
Route::get('user/{user}', [UserController::class, 'show']);
Route::put('user/{user}', [UserController::class, 'update']);
Route::delete('user/{user}', [UserController::class, 'destroy']);

Route::get('kategori', [KategoriController::class, 'index']);
Route::post('kategori', [KategoriController::class, 'store']);
Route::get('kategori/{kategori}', [KategoriController::class, 'show']);
Route::put('kategori/{kategori}', [KategoriController::class, 'update']);
Route::delete('kategori/{kategori}', [KategoriController::class, 'destroy']);

Route::get('barang', [BarangController::class, 'index']);
Route::post('barang', [BarangController::class, 'store']);
Route::get('barang/{barang}', [BarangController::class, 'show']);
Route::put('barang/{barang}', [BarangController::class, 'update']);
Route::delete('barang/{barang}', [BarangController::class, 'destroy']);

Route::get('supplier', [SupplierController::class, 'index']);
Route::post('supplier', [SupplierController::class, 'store']);
Route::get('supplier/{supplier}', [SupplierController::class, 'show']);
Route::put('supplier/{supplier}', [SupplierController::class, 'update']);
Route::delete('supplier/{supplier}', [SupplierController::class, 'destroy']);

Route::get('stok', [StokController::class, 'index']);
Route::post('stok', [StokController::class, 'store']);
Route::get('stok/{stok}', [StokController::class, 'show']);
Route::put('stok/{stok}', [StokController::class, 'update']);
Route::delete('stok/{stok}', [StokController::class, 'destroy']);