<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;


class DivisionTranslation extends Model
{
    

    protected $fillable = ['name','division_id'];
    protected $table = 'Divisions_translations';
    public $timestamps = false;
   
}