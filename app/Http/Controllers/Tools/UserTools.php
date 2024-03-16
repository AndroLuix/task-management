<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserTools extends Controller
{
    public function createUser(array $data){
       
       return  User::create($data);

    }
}
