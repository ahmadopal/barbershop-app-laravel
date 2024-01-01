<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Transaction extends Model
{
    //use HasFactory;
    use softDeletes;

    //declare table
    public $table = 'transaction';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];
    
    //declare fillable
    protected $fillable = [
        'appointment_id',
        'price_service',
        'total',
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    //One to One Relationship
    public function appointment()
    {
        //3 Paramater (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\Operational\Appointment', 'appointment_id', 'id');
    }
}
