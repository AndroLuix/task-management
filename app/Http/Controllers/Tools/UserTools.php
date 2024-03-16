<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserTools extends Controller
{
    public function createUser(array $data){
       $validatorTool = new ValidateDataTools();
          $validatorTool->validateUser($data);
    
        if($validatorTool->fails()){
            return back()->
            withErrors($validatorTool)
                ->withInput();
        }
        
       return  User::create($data);

    }
}
