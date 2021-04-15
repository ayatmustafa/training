<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['user_id'];
    protected $hidden   = ['created_at', 'updated_at'];
    public function teacherClasses() {
        return $this->hasMany(ClassTeacher::class, 'teacher_id');
    }
}
