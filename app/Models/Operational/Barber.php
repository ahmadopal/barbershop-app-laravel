<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Barber extends Model
{
    //use HasFactory;
    use softDeletes;

    //declare table
    public $table = 'barber';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];
    
    //declare fillable
    protected $fillable = [
        'name',
        'photo',
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    //One to Many Relationship
    public function appointment()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasMany('App\Models\Operational\Appointment', 'barber_id');
    }
}
