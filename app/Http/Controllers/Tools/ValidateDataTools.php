<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidateDataTools extends Controller
{
    public function validateUser(array $data)
    {
        $rules = [
            'name' => ['required','string','max:100','min:2'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];

        $message = [
            'name.max' => 'Name too Looooong',
            'name.min'=>'Name so short!',
            'email.unique:users'=> 'This email is already registered in the system',
            'password.confirmed'=>'The password don\'t match',
            'password.min'=> 'Please enter a password longer than 8 characters'
        ];

        return \Illuminate\Support\Facades\Validator::make($data,$rules,$message);
    }
}
