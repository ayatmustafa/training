<?php

namespace Modules\ConfigModule\Entities;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $fillable = ['name','division_id','section_id'];
    protected $table ='grades';
    protected $hidden = ['created_at', 'updated_at'];
    // enhancement by default it's true no need to do this.
    public $timestamps = true;

    public function section()
    {
        return $this->belongsTo('Modules\ConfigModule\Entities\Section');
    }
    // enhancement wrong function name
    // also  u can use Division::class to get the relative path
    public function division()
    {
        return $this->belongsTo('Modules\ConfigModule\Entities\Division');
    }
    public function gradeSubjects() {
        return $this->hasMany(GradeSubject::class);
    }

}
