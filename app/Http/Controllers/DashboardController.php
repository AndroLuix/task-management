<?php

namespace App\Http\Controllers;

use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $userId = Auth::id();
        $folders = Folder::getMyFolders($userId);

        return view('dashboard',compact('folders'));
    }
}
