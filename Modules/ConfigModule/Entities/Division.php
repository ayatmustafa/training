<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Modules\Student\Entities\Student;

class Division extends Model implements TranslatableContract
{

    use Translatable;
    protected $fillable = ['logo','school_id'];
    public $translatedAttributes = ['name'];
    protected $hidden   =  ['created_at', 'updated_at'];

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
    // enhancement this not write function name
    public function divisionSubjects() {
        return $this->hasMany(DivisionSubject::class);
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function school()
    {
        return $this->belongsTo(School::class,'school_id');
    }
}
