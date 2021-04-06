<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;


class Division extends Model implements TranslatableContract
{

    use Translatable;
    protected $fillable = ['logo','school_id'];
    public $translatedAttributes = ['name'];
    public function Section()
    {
        return $this->hasMany('Modules\ConfigModule\Entities\Section');
    }
    
}
