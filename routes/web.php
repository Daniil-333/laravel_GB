<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\IndexController as AdminIndexController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\Admin\ParserController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\CategoryController;
use App\Http\Controllers\News\IndexController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/save', [HomeController::class, 'save'])->name('save');

Route::get('/auth', [AuthController::class, 'index'])->name('auth');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::match(['get', 'post'],'/profile', [ProfileController::class, 'update'])
    ->middleware('auth')
    ->name('updateProfile');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth', 'is_admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::name('news.')
    ->prefix('news')
    ->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('index');
        Route::get('/one/{id}', [IndexController::class, 'show'])->where('id', '[0-9]+')->name('show');
        Route::get('/category/{id}', [CategoryController::class, 'showById'])->where('id', '[0-9]+')->name('category.show');
        Route::get('/category/{slug}', [CategoryController::class, 'showBySlug'])->where('name', '[A-Za-z]+')->name('category.single');
    });

Route::name('admin.')
    ->prefix('admin')
    ->middleware(['auth', 'is_admin'])
    ->group(function () {
        Route::get('/', [AdminNewsController::class, 'index'])->name('index');
        Route::resource('/news', AdminNewsController::class)->except('show');
        Route::resource('/category', AdminCategoryController::class)->except('show');
        Route::resource('/resource', AdminResourceController::class)->except('show');

        Route::get('/parser', [ParserController::class, 'index'])->name('parser');

        Route::get('/test1', [AdminIndexController::class, 'test1'])->name('test1');
        Route::match(['get', 'post'],'/test2', [AdminIndexController::class, 'test2'])->name('test2');
        Route::resource('/users', UsersController::class)->except('show');
    });


//Route::redirect('redirect', '/', 301);

Route::fallback(function () {
    return view('404');
});

Route::get('/auth/{soc}', [LoginController::class, 'loginSoc'])->name('loginSoc');
Route::get('/auth/{soc}/response', [LoginController::class, 'reponseSoc'])->name('responseSoc');

Auth::routes();
/*Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('logout', [LoginController::class, 'logout'])->name('logout');
Route::post('logout', [LoginController::class, 'logout']);*/

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
