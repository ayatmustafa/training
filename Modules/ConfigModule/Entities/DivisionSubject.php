<?php

namespace Modules\ConfigModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DivisionSubject extends Model
{
    protected $fillable = ['subject_id', 'division_id', 'user_id'];
    protected $hidden   =  ['created_at', 'updated_at'];

    public function subject() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function grades() {
        return $this->belongsToMany(Grade::class, 'grade_subjects', 'division_subject_id', 'grade_id');
    }
    public function gradeSubjects()
    {
        return $this->hasMany(GradeSubject::class, 'division_subject_id');
    }
    public function division() {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }

}
