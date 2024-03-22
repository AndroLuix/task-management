<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory; 

    protected $fillable = [
        'project_manager_id',
        'folder_id',
        'title',
        'description',
        'is_archived',
        'is_terminated'
    ];

    public function folder(){
        $this->belongsTo(Folder::class);
    }
    public function isTerminated(){
        if($this->where('is_terminated',1)){
            return true;
        } else{
            return false;
        }
    }

    public function isArchived(){
        if($this->where('is_archived',1)){
            return true;
        } else{
            return false;
        }
    }

    

}
