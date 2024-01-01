<?php

namespace App\Models\ManagementAccess;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class RoleUser extends Model
{
    //use HasFactory;
    use softDeletes;

    //declare table
    public $table = 'role_user';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];
    
    //declare fillable
    protected $fillable = [
        'role_id',
        'user_id',
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    //One to Many Relationship
    public function role()
    {
        //3 Paramater (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\ManagementAccess\Role', 'role_id', 'id');
    }
    
    //One to Many Relationship
    public function user()
    {
        //3 Paramater (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
