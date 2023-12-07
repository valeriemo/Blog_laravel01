<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login'); //dossier:auth page:login
    }

    /**
     * Show the form for creating a new resource.
     * Saisir un nouveau utilisateur
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     *                                                                       ****** FAIRE VALIDATION DANS TP1 !!!!!
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'min:2|max:45',
            'email' => 'email|required|unique:users',
            'password' => ['min:6','max:20'],
        ]);
        // si la validation ne passe pas redirect()->back()->withErrors()->withInputs
        // sinon continue...
        $user = new User;
        $user->fill($request->all());
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect(route('login'))->withSuccess('Utilisateur enregistré !');
    }

    /**
     * Méthode pour authentifier un login
     * quand c'est une méthode post il y a toujours un request
     */
    public function authentication(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'min:6|max:20'
        ]);

        return $request;
    }
}
