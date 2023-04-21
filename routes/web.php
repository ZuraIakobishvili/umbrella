<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function(){
    return view('welcome')->name('welcome');
});

Route::get('/register', [RegisterController::class,'create'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class,'storeRegister']);
// Route::view('/dashboard', 'dashboard')->name('dashboard');
Route::get('/dashboard', function(){
    $posts = Post::all();
    return view('dashboard', compact('posts'));
})->name('dashboard');

Route::get('login', [LoginController::class, 'login'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'storeLogin'])->name('storeLogin');

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');


Route::group(['prefix' => 'admin'], function () {
    Route::controller(PostController::class)->group(function(){
        Route::get('/posts',  'posts')->name('posts');
        Route::post('/store', 'store')->name('store');
        Route::get('/edit{post}', 'editPost')->name('update');
        Route::put('/update/{post}', 'update')->name('updatePost');
        ROute::delete('/destroy/{post}', 'destroyPost')->name('destroyPost');

    });
});