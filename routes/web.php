<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ChannelController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\MusicController;
use App\Http\Controllers\ZoneController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::prefix('/')->middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.index');
        Route::get('/profiles/{id}', [UserController::class, 'profiles'])->name('admin.profiles');
        Route::post('update/profiles/{id}', [UserController::class, 'updateprofiles'])->name('admin.update.profiles');
        Route::get('/formlogin', [UserController::class, 'formlogin'])->name('admin.login');
        Route::post('/postlogin', [UserController::class, 'login'])->name('admin.postlogin');
        Route::get('/form_change_password/{id}', [UserController::class, 'form_change_password'])->name('form_change_password');
        Route::post('/post/form_change_password/{id}', [UserController::class, 'post_form_change_password'])->name('post_form_change_password');
    });
    Route::prefix('category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/forminsertcate', [CategoryController::class, 'forminsertcate'])->name('category.forminsertcate');
        Route::post('/insertcate', [CategoryController::class, 'insertcate'])->name('category.insertcate');
        Route::get('/activecategory', [CategoryController::class, 'activecategory'])->name('category.activecategory');
        Route::get('/formupdatecate/{id}', [CategoryController::class, 'formupdatecate'])->name('category.formupdatecate');
        Route::put('/updatecate/{id}', [CategoryController::class, 'updatecate'])->name('category.updatecate');
        Route::delete('/deletecate/{id}', [CategoryController::class, 'deletecate'])->name('category.deletecate');
    });
    Route::prefix('channel')->group(function () {
        Route::get('/index', [ChannelController::class, 'index'])->name('channel.index');
        Route::get('/form_update/{id}', [ChannelController::class, 'form_update'])->name('channel.form_update');
    });
    Route::prefix('menu')->group(function () {
        Route::get('/index', [MenuController::class, 'index'])->name('menu.index');
    });
    Route::prefix('service')->group(function () {
        Route::get('/index', [ServiceController::class, 'index'])->name('service.index');
    });
    Route::prefix('movie')->group(function () {
        Route::get('/index', [MovieController::class, 'index'])->name('movie.index');
    });
    Route::prefix('music')->group(function () {
        Route::get('/index', [MusicController::class, 'index'])->name('music.index');
    });
    Route::prefix('zone')->group(function () {
        Route::get('/index', [ZoneController::class, 'index'])->name('zone.index');
    });
// });
