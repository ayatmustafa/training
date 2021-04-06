<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;


class DivisionTranslation extends Model
{
    

    protected $fillable = ['name','division_id',"locale"];
    protected $table = 'division_translations';
    public $timestamps = false;
   
}