<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

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

Route::prefix('/')->middleware(['auth', 'prevent-back-history'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.index');
        Route::get('/profiles/{id}', [UserController::class, 'profiles'])->name('admin.profiles');
        Route::post('update/profiles/{id}', [UserController::class, 'updateprofiles'])->name('admin.update.profiles');
        Route::get('/formlogin', [UserController::class, 'formlogin'])->name('admin.login');
        Route::post('/postlogin', [UserController::class, 'login'])->name('admin.postlogin');
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
});
