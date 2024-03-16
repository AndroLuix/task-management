<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Tools\UserTools;
use App\Models\User;
use Illuminate\Auth\CreatesUserProviders;
use Illuminate\Http\Request;

class RegistController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function create(Request $request){

        $createUser = UserTools();
        $createUser->createUser($request->all());

        return view('dashboard');
       
    }
}
