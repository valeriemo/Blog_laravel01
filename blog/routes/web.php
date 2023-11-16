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

// va cherche le controller et execute la methode index
Route::get('/home', [BlogController::class, 'index']);

Route::get('/about', [BlogController::class, 'about']);

Route::get('/article', [BlogController::class, 'article']);

Route::get('/contact', [BlogController::class, 'contact']);


