<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // route / controller / view
    public function index(){
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


}
