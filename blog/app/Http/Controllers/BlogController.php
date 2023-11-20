<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    // route / controller / view
    public function index()
    {
        return view('home', ['name' => 'peter']);
    }

    public function about()
    {
        return view('about');
    }

    public function article()
    {
        return view('article');
    }

    public function contact()
    {
        return view('contact');
    }

    // Request est une class qui va créer un objet $request
    // le post est envoyer en tant que tableau mais le request fait la convertion en tant qu'objet deja
    public function message(Request $request)
    {
        //return $request->name; 
        return view('contact', ['data' => $request]);
    }
}
