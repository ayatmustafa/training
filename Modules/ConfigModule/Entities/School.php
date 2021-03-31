<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Factories\HasFactory;

class School extends Model
{
    

    protected $fillable = ['name','address','logo','user_id','created_at','updated_at'];
    protected $table = 'schools';
    
  //  protected static function newFactory()
    // {
    //     return \Modules\ConfigModule\Database\factories\SchoolFactory::new();
    // }
}
