<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogPostController;
use App\Http\Controllers\CustomAuthController;
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

// Méthode pour afficher la page d'accueil
Route::get('/', function () {
    return view('welcome');
});

Route::get('/blog', [BlogPostController::class, 'index'])->name('blog.index');
// Méthode pour afficher la page d'un blog en particulier
Route::get('/blog/{blogPost}', [BlogPostController::class, 'show'])->name('blog.show');

// Méthode pour afficher la page de création
Route::get('/blog-create', [BlogPostController::class, 'create'])->name('blog.create');
// Méthode pour store un nouveau blog
Route::post('/blog-create', [BlogPostController::class, 'store'])->name('blog.store');

// Méthode pour afficher la page de modification
Route::get('/blog/edit/{blogPost}', [BlogPostController::class, 'edit'])->name('blog.edit');
// Méthode pour store le update
Route::put( '/blog/edit/{blogPost}', [BlogPostController::class, 'update'])->name('blog.edit');
// Méthode pour supprimer un article
Route::delete('/blog/{blogPost}', [BlogPostController::class, 'destroy'])->name('blog.delete');

// Test de query
Route::get('query', [BlogPostController::class, 'query']);

// Pagination
Route::get('blog-page', [BlogPostController::class, 'pagination']);

// Auth: http://127.0.0.1:8001/registration
Route::get('/registration', [CustomAuthController::class, 'create'])->name('registration');
Route::post('/registration', [CustomAuthController::class, 'store'])->name('registration');
Route::get('/login',  [CustomAuthController::class, 'index'])->name('login'); //la page login doit toujours s'appeller login
Route::post('/authentication',  [CustomAuthController::class, 'authentication'])->name('authentication');