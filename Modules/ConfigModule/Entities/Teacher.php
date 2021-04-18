<?php

namespace Modules\ConfigModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $fillable = ['user_id'];
    protected $hidden   = ['created_at', 'updated_at'];
    public function teacherClasses() {
        return $this->hasMany(ClassTeacher::class, 'teacher_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
