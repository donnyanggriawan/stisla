<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['guest'])->group(function() {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
    Route::get('/register', [LoginController::class, 'register']);
    Route::post('/register', [LoginController::class, 'store']);
});

Route::get('/home', function() {
    return redirect('/admin');
});

Route::get('/coba', function() {
    return view('post.index', [
        'title' => 'Post'
    ]);
});

Route::middleware(['auth'])->group(function() {
    // Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/admin', [AdminController::class, 'admin'])->middleware('userAkses:admin');
    Route::get('/admin/user', [AdminController::class, 'user'])->middleware('userAkses:user');
    Route::get('/logout', [LoginController::class, 'logout']);

    
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile/update', [ProfileController::class, 'updateProfile']);
    Route::get('/profile/password', [ProfileController::class, 'passwordView']);
    Route::put('/profile/password/update', [ProfileController::class, 'changePassword']);
    
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    // Post
    Route::get('/post/detail/{id}', [PostController::class, 'detail']);

    // user akses admin
    Route::get('/genre', [GenreController::class, 'index'])->middleware("userAkses:admin");
    Route::get('/genre/tambah', [GenreController::class, 'tambahGenre'])->middleware("userAkses:admin");
    Route::post('/genre/tambah', [GenreController::class, 'storeGenre'])->middleware("userAkses:admin");
    Route::get('/genre/edit/{id}', [GenreController::class, 'editGenre'])->middleware('userAkses:admin');
    Route::put('/genre/edit/{id}', [GenreController::class, 'updateGenre'])->middleware('userAkses:admin');
    Route::get('/genre/delete/{id}', [GenreController::class, 'destroy'])->middleware('userAkses:admin');
    // Route::get('/admin', [AdminController::class, 'index'])->middleware('userAkses:admin');

    // user akses user
    Route::get('/post/tambah', [PostController::class, 'add'])->middleware("userAkses:user");
    Route::post('/post/tambah', [PostController::class, 'store'])->middleware("userAkses:user");
    Route::get('/post', [PostController::class, 'showPost'])->middleware("userAkses:user");
    Route::get('/post/edit/{id}', [PostController::class, 'editPost'])->middleware("userAkses:user");
    Route::put('/post/edit/{id}', [PostController::class, 'updatePost'])->middleware("userAkses:user");
    Route::get('/post/delete/{id}', [PostController::class, 'destroy'])->middleware('userAkses:user');
    // Route::get('/user', [UserController::class, 'index'])->middleware('userAkses:user');
});

