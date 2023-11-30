<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');

// laravel va recevoir l'id a partir d'une variable $blogPost(correspond au model)
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show'); //le nom + la méthode

Route::get('/blog-create', [BlogPostController::class, 'create'])->name('blog.create'); 
Route::post('/blog-create', [BlogPostController::class, 'store'])->name('blog.store'); //reste sur la meme page