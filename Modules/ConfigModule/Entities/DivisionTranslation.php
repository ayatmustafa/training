<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;


class DivisionTranslation extends Model
{

    protected $fillable = ['name','division_id',"locale"];
    protected $hidden   = ['created_at', 'updated_at'];   
}