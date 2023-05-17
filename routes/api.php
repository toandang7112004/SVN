<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\MovieController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\ZoneController;
use App\Http\Controllers\Api\MusicController;
use App\Http\Controllers\Api\HotelController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('menu')->group(function () {
    Route::get('index' , [MenuController::class,'index'] );
});
Route::prefix('movie')->group(function () {
    Route::get('index' , [MovieController::class,'index'] );
});
Route::prefix('service')->group(function () {
    Route::get('index' , [ServiceController::class,'index'] );
});
Route::prefix('zone')->group(function () {
    Route::get('index' , [ZoneController::class,'index'] );
});
Route::prefix('music')->group(function () {
    Route::get('index' , [MusicController::class,'index'] );
});
Route::prefix('hotel')->group(function () {
    Route::get('index' , [HotelController::class,'index'] );
});
