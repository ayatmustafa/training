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
    protected $hidden   =  ['created_at', 'updated_at'];

    public function Section()
    {
        return $this->hasMany('Modules\ConfigModule\Entities\Section');
    }
    public function Grade()
    {
        return $this->hasMany('Modules\ConfigModule\Entities\Grade');
    }
    // enhancement this not write function name
    public function divisionSubjects() {
        return $this->hasMany(DivisionSubject::class);
    }
    public function students()
    {
        return $this->hasMany('Modules\Student\Entities\Student');
    }
}
