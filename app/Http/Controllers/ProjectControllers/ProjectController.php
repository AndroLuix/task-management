<?php

namespace App\Http\Controllers\ProjectControllers;

use App\Http\Controllers\Controller;
use App\Models\Folder;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    public function index( $idfolder = null){
        // visualizza tutti i progetti creati
        // null nel caso l'utente vuole vedere i progetti pubblici 
        if(!isset($idfolder)){
            // visualizza progetti pubblici
            Projects::where('is_public',1);
        }
    
    }

    public function getByFolder($idProject , $idFolder){
    $projects =  Projects::where('folder_id', $idFolder)->get();
    $projectFirst = Projects::findOrFail($idProject);
    
    return view('.projects.projects', compact('projects','projectFirst'));
    
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
    public function exg(Request $req){
        //cambia la cartella 
        $data =  $req->all();
       // return dd($data);

       $project = Projects::find($data['id']);
       $project->folder_id = (int)$data['folder_id'];
       $project->save();
       return back();

    }

    public function edit($idprject){
        $project = Projects::findOrFail($idprject);
        $allProjects = Projects::where('project_manager_id',Auth::id())->get();


        return view('projects.edit', compact('project','allProjects'));
    }

    public function update(Request $request, $project){
        // prende i dati per modificare il progetto
        dd($request->all());
        $updateProject = Projects::find($project)->update($request->all());
        if($updateProject)
        return back()->with('success',"Project {$updateProject->title} has been successfully updated!");
        else         return back()->withErrors("Ooops! There was an error in the system, please contact us to resolve it");

    }

    public function archive($id){
        // archivia un progetto
        $project = Projects::find($id);
        if($project->is_archived == 0){
            $project->is_archived = 1;
            $project->save();
        }else{
            $project->is_archived = 0;
            $project->save();
        }


        return back();

    }

    public function delete(){
        // elimina il songolo progetto
    }
}
