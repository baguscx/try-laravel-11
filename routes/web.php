<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models\Article;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'home');

Route::get('/', Controllers\HomeController::class);
Route::get('/about', [Controllers\AboutController::class, 'index']);
Route::get('/contact', [Controllers\ContactController::class, 'index']);
Route::get('/gallery', [Controllers\GalleryController::class, 'index']);
Route::get('/users', [Controllers\UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/create', [Controllers\UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users', [Controllers\UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user:id}', [Controllers\UserController::class, 'show'])->name('users.show')->middleware('auth');
Route::get('/users/{user:id}/edit', [Controllers\UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user:id}', [Controllers\UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user:id}', [Controllers\UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

Route::get('/articles/create', function(){
    Article::create([
        'title' => $title = 'Article Pertama',
        'slug' => str($title)->slug(),
        'body' => $body = 'Konten dari article pertama',
        'teaser' => str($body)->limit(160),
        'meta_title' => $title,
        'meta_description' => str($body)->limit(160),
    ]);
});

// Route::get('users', function(){
//     $users = [
//         ['id' => 2, 'name' => 'Jane', 'email' => 'jane@gmail.com'],
//         ['id' => 1, 'name' => 'John', 'email' => 'john@gmail.com'],
//     ];
//     return view('users.index', compact('users'));
// });


///////////////////////////// LOGIN //////////////////////////////////////
Route::get('login', [Controllers\LoginController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('login', [Controllers\LoginController::class, 'autheticate'])->middleware('guest');

Route::post('logout', Controllers\LogoutController::class)->name('logout')->middleware('auth');
