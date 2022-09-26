<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\IndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|npm i
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/auth', [AuthController::class, 'index'])->name('auth');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/category/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+')->name('category.single');
        Route::get('/category/{slug}', [CategoryController::class, 'showBySlug'])->where('name', '[A-Za-z]+')->name('category.single');
        Route::get('/{id}', [IndexController::class, 'show'])->where('id', '[0-9]+')->name('single');
    });

//Route::name('category.')
//    ->prefix('category')
//    ->group(function () {
//        Route::get('/', [CategoryController::class, 'index'])->name('index');
//        Route::get('/{id}', [CategoryController::class, 'show'])->where('id', '[0-9]+')->name('single');
//    });

Route::name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', [AdminIndexController::class, 'index'])->name('index');
        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::get('/test2', [AdminIndexController::class, 'test2'])->name('test2');
        Route::get('/add_news', [AdminIndexController::class, 'addNews'])->name('add_news');
});



Route::redirect('redirect', '/', 301);

Route::fallback(function () {
    return view('404');
});
