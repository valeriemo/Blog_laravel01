<?php
// fichier routage de toutes les pages: sur le navigateur

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;  // on spécifie le chemin pour ensuite pouvoir utiliser blogcontroller 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// méthode get : ce qu'on passe dans le url (un get). Quels sont les url que l'on va avoir
Route::get('/', function () {
    return view('welcome'); // pointe vers ressources/views -> le nom du fichier + .blade (welcome.blade.php)
});

// va cherche le controller et execute la methode index|| name donne un nom à la route
Route::get('/home', [BlogController::class, 'index'])->name('home');

Route::get('/about', [BlogController::class, 'about'])->name('about');

Route::get('/article', [BlogController::class, 'article'])->name('article');

Route::get('/contact', [BlogController::class, 'contact'])->name('contact');
// La route du formulaire doit etre de la methode POST + creation d'une nouvelle méthode dans le controller pour le comportement du post 
Route::post('/contact', [BlogController::class, 'message'])->name('contact');
