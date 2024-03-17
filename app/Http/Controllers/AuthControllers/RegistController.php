<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\UserTools;
use App\Models\User;
use Illuminate\Auth\CreatesUserProviders;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RegistController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function create(Request $request){

        $createUser = new UserTools();
        $result = $createUser->createUser($request->all());

        if ($result instanceof RedirectResponse) {
            // Se la creazione dell'utente restituisce un redirect,
            // reindirizziamo direttamente l'utente alla pagina di registrazione con gli errori di validazione
            return $result;
        }

        return redirect()->route('dashboard');
       
    }
}
