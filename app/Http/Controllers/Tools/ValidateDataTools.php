<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidateDataTools extends Controller
{
    public function validateUser(array $data)
    {
        
        $rules = [
            'nome'
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $message = [
            'email.unique:users'=> 'This email has used by other user',
            'password.confirmed'=>'The password don\'t match',
        ];

        return \Illuminate\Support\Facades\Validator::make($data,$rules,$message);
    }
}
