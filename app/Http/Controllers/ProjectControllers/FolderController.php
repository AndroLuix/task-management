<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FolderController extends Controller
{
   // gestione dei folders

   public function index()
   {
      $userID = Auth::user()->id;
      $folders = Folder::with('projects')->whereProjectManagerId($userID)->get();
      return view('folder.index',compact('folders'));
   }

   public function create(Request $request)
   {
      $data =  $request->all();
      $data['project_manager_id'] = Auth::user()->id;
      $folder = Folder::create($data);

      if ($folder)
         return back()->with('success', 'Folder created Successfully!');
      else
      return back()->withErrors('Something went wrong');
   }
}
