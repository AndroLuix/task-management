<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class UserTools extends Controller
{
    public function createUser(array $data){
       $validatorTool = new ValidateDataTools();
          $validateUser = $validatorTool->validateUser($data);
    
        if($validateUser->fails()){
            return redirect()->route('register')->
            withErrors($validateUser)
                ->withInput();
                
        }else{
            $data['password'] = Hash::make($data['password']); 
            $user =  User::create($data);
            Auth::login($user);
            return $user;
        }

    }
}
