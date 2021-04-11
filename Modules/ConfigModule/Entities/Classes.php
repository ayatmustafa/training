<?php

namespace Modules\ConfigModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;

class Classes extends Model
{
    protected $table = "classes";
    protected $fillable = 
    [
        'division_id', 
        'grade_id', 
        'name',
        'user_id',
    ];
    protected $hidden = ['created_at', 'updated_at'];
    public function grade() {
        return $this->belongsTo(Grade::class);
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function division() {
        return $this->belongsTo(Division::class);
    }    
    public function students() {
        return $this->hasMany(Student::class,'class_id');
    }
    public function TeacherClasses() {
        return $this->hasMany(ClassTeacher::class,'class_id');
    }

}
