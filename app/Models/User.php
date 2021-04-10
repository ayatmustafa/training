<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Passport\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Modules\ConfigModule\Entities\School;
use Laratrust\Traits\LaratrustUserTrait;
use Modules\OnlineClasses\Entities\OnlineClass;
use Modules\Student\Entities\Student;

class User extends Authenticatable  
{
    use LaratrustUserTrait;
    use HasApiTokens, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','created_at', 'updated_at', 'email_verified_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function schools() {
        return $this->hasMany(School::class);
    }
    public function onlineClasses() {
        return $this->hasMany(OnlineClass::class);
    }
    public function student() {
        return $this->belongsTo(Student::class, 'user_id');
    }
}

