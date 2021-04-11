<?php

namespace Modules\ConfigModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\Student\Entities\Student;

// model class name should be Singular like Class
class AcademicClass extends Model
{
    // enhancement no need to add $table except its class name is different from db table
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
    // enhancement name should be teacherClass camel case
    public function teacherClass() {
        return $this->hasMany(ClassTeacher::class,'academic_class_id');
    }

}
