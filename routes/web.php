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
use App\Http\Controllers\HotelController;

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

Route::get('/formlogin', [UserController::class, 'formlogin'])->name('admin.login');
Route::post('/postlogin', [UserController::class, 'login'])->name('admin.postlogin');
Route::prefix('/')->middleware(['auth', 'prevent-back-history'])->group(function () {
    // Route::prefix('admin')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin.index');
    Route::get('/profiles/{id}', [UserController::class, 'profiles'])->name('admin.profiles');
    Route::post('update/profiles/{id}', [UserController::class, 'updateprofiles'])->name('admin.update.profiles');
    Route::get('/logout', [UserController::class, 'logout'])->name('admin.logout');
    Route::get('/form_change_password/{id}', [UserController::class, 'form_change_password'])->name('form_change_password');
    Route::post('/post/form_change_password/{id}', [UserController::class, 'post_form_change_password'])->name('post_form_change_password');
    // });
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
        Route::get('/create', [ChannelController::class, 'create'])->name('channel.create');
        Route::post('/store', [ChannelController::class, 'store'])->name('channel.store');
        Route::get('/edit/{id}', [ChannelController::class, 'edit'])->name('channel.edit');
        Route::put('/update/{id}', [ChannelController::class, 'update'])->name('channel.update');
        Route::delete('/delete/{id}', [ChannelController::class, 'delete'])->name('channel.delete');
    });
    Route::prefix('menu')->group(function () {
        Route::get('/index', [MenuController::class, 'index'])->name('menu.index');
        Route::get('/create', [MenuController::class, 'create'])->name('menu.create');
        Route::get('/edit/{id}', [MenuController::class, 'edit'])->name('menu.edit');
        Route::put('/update/{id}', [MenuController::class, 'update'])->name('menu.update');
        Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
        Route::delete('/delete/{id}', [MenuController::class, 'delete'])->name('menu.delete');
    });
    Route::prefix('service')->group(function () {
        Route::get('/index', [ServiceController::class, 'index'])->name('service.index');
        Route::get('/create', [ServiceController::class, 'create'])->name('service.create');
        Route::post('/store', [ServiceController::class, 'store'])->name('service.store');
        Route::get('/edit/{id}', [ServiceController::class, 'edit'])->name('service.edit');
        Route::put('/update/{id}', [ServiceController::class, 'update'])->name('service.update');
        Route::delete('/delete/{id}', [ServiceController::class, 'delete'])->name('service.delete');
    });
    Route::prefix('movie')->group(function () {
        Route::get('/index', [MovieController::class, 'index'])->name('movie.index');
        Route::get('/create', [MovieController::class, 'create'])->name('movie.create');
        Route::get('/edit/{id}', [MovieController::class, 'edit'])->name('movie.edit');
        Route::put('/edit/{id}', [MovieController::class, 'update'])->name('movie.update');
        Route::post('/store', [MovieController::class, 'store'])->name('movie.store');
        Route::delete('/delete/{id}', [MovieController::class, 'delete'])->name('movie.delete');
    });
    Route::prefix('music')->group(function () {
        Route::get('/index', [MusicController::class, 'index'])->name('music.index');
        Route::get('/create', [MusicController::class, 'create'])->name('music.create');
        Route::get('/edit/{id}', [MusicController::class, 'edit'])->name('music.edit');
        Route::put('/update/{id}', [MusicController::class, 'update'])->name('music.update');
        Route::post('/store', [MusicController::class, 'store'])->name('music.store');
        Route::delete('/delete/{id}', [MusicController::class, 'delete'])->name('music.delete');
    });
    Route::prefix('hotel_info')->group(function () {
        Route::get('/index', [HotelController::class, 'index'])->name('hotel_info.index');
        Route::get('/create', [HotelController::class, 'create'])->name('hotel_info.create');
        Route::post('/store', [HotelController::class, 'store'])->name('hotel_info.store');
        Route::get('/edit/{id}', [HotelController::class, 'edit'])->name('hotel_info.edit');
        Route::put('/update/{id}', [HotelController::class, 'update'])->name('hotel_info.update');
        Route::delete('/delete/{id}', [HotelController::class, 'delete'])->name('hotel_info.delete');
    });
    Route::prefix('zone')->group(function () {
        Route::get('/index', [ZoneController::class, 'index'])->name('zone.index');
    });
    Route::prefix('user')->group(function () {
        Route::get('/list', [UserController::class, 'list'])->name('user.list');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });
});
