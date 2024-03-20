<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index(){
        // visualizza tutti i progetti creati
        
    }

    public function create(Request $request){
        // crea il progetto

        // non utilizzo validator, in questo caso credo sia superfluo.
        $data = $request->all();
        
        $data['project_manager_id'] = Auth::id();

        $project = Projects::create($data);
        if($project)
            return back()->with('success','Project has been created!');
        else
             return back()->withErrors('Something went wrong during the creation of the project');
    }

    public function edit(){
        // visualizza la pagina di modifica di un progetto
    }

    public function update(){
        // prende i dati per modificare il progetto
    }

    public function archive(){
        // archivia un progetto
    }

    public function delete(){
        // elimina il songolo progetto
    }
}
