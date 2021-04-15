<?php

namespace Modules\ConfigModule\Entities;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $fillable = ['name'];
    protected $table ='grades';
    protected $hidden = ['created_at', 'updated_at'];
    // enhancement by default it's true no need to do this.


    // enhancement wrong function name
    // also  u can use Division::class to get the relative path

}
