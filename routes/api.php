<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\olehAPIController;
use App\Http\Controllers\API\PenggunaAPIController;
use App\Http\Controllers\API\transaksiPesananAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('pengguna/register',[PenggunaAPIController::class,'register']);
Route::post('transaksi_pesanan/tambah',[transaksiPesananAPIController::class,'tambah']);
Route::get('oleh/get/{id?}',[olehAPIController::class,'get']);

