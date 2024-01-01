<?php

namespace App\Models\Operational;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Appointment extends Model
{
    //use HasFactory;
    use softDeletes;

    //declare table
    public $table = 'appointment';

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'created_at', 
        'updated_at',
        'deleted_at',
    ];
    
    //declare fillable
    protected $fillable = [
        'barber_id',
        'user_id',
        'service_id',
        'date',
        'time',
        'status',
        'created_at', 
        'updated_at',
        'deleted_at',
    ];

    //One to Many Relationship
    public function barber()
    {
        //3 Paramater (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\Operational\Barber', 'barber_id', 'id');
    }

    //One to Many Relationship
    public function user()
    {
        //3 Paramater (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }

    //One to Many Relationship
    public function service()
    {
        //3 Paramater (path model, field foreign key, field primary key from table hasMany/hasOne)
        return $this->belongsTo('App\Models\MasterData\Service', 'service_id', 'id');
    }

    //One to One Relationship
    public function transaction()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasOne('App\Models\Operational\Transaction', 'appointment_id');
    }
}
