<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class GradeSubject extends Model
{
    protected $fillable = ['grade_id', 'division_subject_id'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function divisionSubject() {
        return $this->belongsTo(DivisionSubject::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id');
    }
}
