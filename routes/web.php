<?php

use App\Models\foto;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

Route::get('/', function(){  
    return view('dashboard.home', [
        'posts' => Foto::filter()->latest()->get()]);
});

//CRUD
Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth');
Route::post('/dashboard', [HomeController::class, 'store'])->middleware('auth')->name('image.store');
Route::get('/dashboard/{post}/detail', [HomeController::class, 'show'])->middleware('auth');



//Login
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('/login', [LoginController::class, 'adminauthenticate'])->name('login.authenticate');

//Register
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store'])->name('user.store');


//Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout.user');


//album
Route::get('/album', [AlbumController::class, 'index'])->middleware('auth');

//profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');
Route::post('/profile', [ProfileController::class, 'store'])->middleware('auth')->name('album.store');
Route::get('/profile/{id}', [ProfileController::class, 'showprofile'])->middleware('auth')->name('profile.show');
Route::get('/profile/{post}/posts', [ProfileController::class, 'show'])->middleware('auth');
Route::get('/profile/{post}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/{post}/update', [ProfileController::class, 'update'])->middleware('auth')->name('image.update');
Route::get('/profile/{post}/delete', [ProfileController::class, 'destroy'])->middleware('auth')->name('image.delete');

//komen
Route::post('/dashboard/{post}/komen', [CommentController::class, 'store'])->name('foto.komen')->middleware('auth');
Route::delete('/komentar/{post}', [CommentController::class, 'destroy'])->name('komentar.destroy')->middleware('auth');

// like
Route::get('/post/{post}/like', [LikeController::class, 'likee'])->middleware('auth')->name('foto.like');


//Admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
    Route::get('/admin/posts', [AdminController::class, 'showPosts'])->name('admin.posts');
    Route::get('/admin/{post}/delete', [AdminController::class, 'destroy'])->name('admin.deletePost');
    Route::delete('/admin/{id}/delete', [AdminController::class, 'deleteuser'])->name('admin.deleteUser');

});
