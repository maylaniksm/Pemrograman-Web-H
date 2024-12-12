<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::resource('/mobil', MobilController::class);
Route::resource('/transaksi', TransaksiController::class);