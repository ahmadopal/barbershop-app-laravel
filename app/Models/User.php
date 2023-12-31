<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\softDeletes;

class User extends Authenticatable
{
    use HasApiTokens;
    //use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use softDeletes;

    //this field must type date yyyy-mm-dd hh:mm:ss
    protected $dates = [
        'email_verified_at',
        'two_factor_confirmed_at', 
        'created_at', 
        'updated_at',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    //One to Many Relationship
    public function appointment()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasMany('App\Models\Operational\Appointment', 'user_id');
    }

    //One to One Relationship
    public function details_user()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasOne('App\Models\ManagementAccess\DetailUser', 'user_id');
    }

    //One to Many Relationship
    public function role_user()
    {
        //2 Paramater (path model, field foreign key)
        return $this->hasMany('App\Models\ManagementAccess\RoleUser', 'user_id');
    }
}
