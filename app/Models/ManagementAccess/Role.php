<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Role extends Model
{
    //use HasFactory;
    use softDeletes;

    //declare table
    public $table = 'role';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];
    
    //declare fillable
    protected $fillable = [
        'title',
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    //One to Many Relationship
    public function role_user()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'role_id');
    }
    
    //One to Many Relationship
    public function permission_role()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\PermissionRole', 'role_id');
    }
}
