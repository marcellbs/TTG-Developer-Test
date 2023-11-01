<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuAPIController;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Menampilkan semua data buku
Route::get('buku', [BukuAPIController::class, 'index']);
Route::get('buku/{id}', [BukuAPIController::class, 'show']);
Route::post('buku', [BukuAPIController::class, 'store']);
Route::put('buku/{id}', [BukuAPIController::class, 'update']);
Route::delete('buku/{id}', [BukuAPIController::class, 'destroy']);

