<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class LoginController extends Controller
{
    public function index(){

        if(Auth::user()){
            // se l'utente esce dal sito, ma l'autenticazione è presente dovrebbe funzionare. ma è da testare in cloud.
            return view('dashboard');
        }

        return view('auth.login');
    }

public function log(Request $req) {
    $credentials = $req->only('email','password');
    if(Auth::attempt($credentials)){
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'Credenziali non valide']);
}
        
    
}
