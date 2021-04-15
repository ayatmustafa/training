<?php

namespace Modules\ConfigModule\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class DivisionSubject extends Model
{
    protected $fillable = ['subject_id', 'division_id', 'user_id'];
    protected $hidden   =  ['created_at', 'updated_at'];

    public function subjects() {
        return $this->hasMany(Subject::class,'id');
    }
    public function gradeSubjects()
    {
        return $this->hasMany(GradeSubject::class);
    }
    public function division() {
        return $this->belongsTo(Division::class, 'division_id');
    }
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function grades()
    {
        return $this->hasMany(Grade::class, 'division_id');
    }
}
