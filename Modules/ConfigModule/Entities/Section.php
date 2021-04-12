<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Modules\Student\Entities\Student;

class Section extends Model implements TranslatableContract
{

    use Translatable;
    protected $fillable = ['status','division_id'];
    protected $hidden  = ['created_at', 'updated_at'];
    public $translatedAttributes = ['name'];

    public function division()
    {
        return $this->belongsTo(Division::class,'division_id');
    }
    //enhancement it should be grades()
    public function grades()
    {
        return $this->hasMany(Grade::class,);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
