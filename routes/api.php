<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PelangganController;

//publik route untuk login
Route::post('/login', [AuthController::class, 'login']);

//semua routes harus pakai token bearer
Route::middleware('auth:sanctum')->group(function () {
    
    //routing produk
    Route::post('/produk/create', [ProdukController::class, 'store']);
    Route::get('/produk/read', [ProdukController::class, 'index']);
    Route::put('/produk/update/{id}', [ProdukController::class, 'update']);
    Route::delete('produk/delete/{id}', [ProdukController::class, 'destroy']);

    //routing kategori
    Route::post('/kategori/create', [KategoriController::class, 'store']);
    Route::get('/kategori/read', [KategoriController::class, 'index']);
    Route::put('/kategori/update/{id}', [KategoriController::class, 'update']);
    Route::delete('/kategori/delete/{id}', [KategoriController::class, 'destroy']);

    //routing pelanggan
    Route::post('/pelanggan/create', [PelangganController::class, 'store']);
    Route::get('/pelanggan/read', [PelangganController::class, 'index']);
    Route::put('/pelanggan/update/{id}', [PelangganController::class, 'update']);
    Route::delete('/pelanggan/delete/{id}', [PelangganController::class, 'destroy']);

    //routing logout
    Route::post('/logout', [AuthController::class, 'logout']);
});