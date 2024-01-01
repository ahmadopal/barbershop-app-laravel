<?php

namespace App\Models\MasterData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Service extends Model
{
    //use HasFactory;
    use softDeletes;

    //declare table
    public $table = 'service';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];
    
    //declare fillable
    protected $fillable = [
        'name',
        'price',
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    //One to Many Relationship
    public function appointment()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasMany('App\Models\Operational\Appointment', 'service_id');
    }
}
