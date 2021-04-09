<?php

namespace Modules\ConfigModule\Entities;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable = ['name','division_id','section_id'];
    protected $hidden   = ['created_at', 'updated_at'];
    public function section() {
        return $this->belongsTo(Section::class);
    }
    public function classes() {
        return $this->hasMany(Classes::class);
    }
    public function subjects() {
        return $this->hasMany(GradeSubject::class);
    }
}
