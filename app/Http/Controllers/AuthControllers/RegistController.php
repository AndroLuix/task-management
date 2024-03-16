<?php

namespace App\Http\Controllers\AuthControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistController extends Controller
{
    public function index(){
        return view('auth.register')
    }
}
