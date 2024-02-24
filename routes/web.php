<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;

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

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'login')->name('login');
    Route::post('/login/proses', 'loginProses')->name('loginProses');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/profil', 'profil')->name('profil');
});
Route::controller(ProductController::class)->middleware(['auth'])->group(function () {
    Route::get('/', 'index')->name("product");
    Route::get('/add/product', 'create');
    Route::post('/store/product', 'store');
    Route::get('/edit/product/{id_product}', 'edit');
    Route::post('/update/product/{id_product}', 'update');
    Route::get('/destroy/product/{id_product}', 'destroy');
});





