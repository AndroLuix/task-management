<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\CreatesUserProviders;
use Illuminate\Http\Request;

class RegistController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function registration(Request $request){

        
       
    }
}
