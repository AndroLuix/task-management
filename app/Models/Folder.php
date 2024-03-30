<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Folder extends Model
{
    use HasFactory;

    protected $table = 'folders';
 
    protected $fillable = [
        'name',
        'project_manager_id',
        'image',
        
    ];

    public static function getMyFolders($userId) {
        return self::where('project_manager_id', $userId)->get();
    }
    public function whereManager($userId) {
        return $this->where('project_manager_id', $userId);
    }
    
    public static function findOrFailsFolder($userId){
        self::where('project_manager_id',$userId)->firstOrFail();
    }
    public function projects(){
       return $this->hasMany(Projects::class, 'folder_id');
    }

  

    public static function folderId($idFolder)
    {
        return self::where('folder_id', $idFolder)->get();
    }
    
}
