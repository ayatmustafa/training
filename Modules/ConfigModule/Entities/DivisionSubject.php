<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class DivisionSubject extends Model
{
    protected $fillable = ['subject_id ', 'division_id', 'user_id'];
    protected $hidden   =  ['created_at', 'updated_at'];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }
    public function grades()
    {
        return $this->hasMany(GradeSubject::class, 'division_subject_id');
    }
    public function divisions() {
        return $this->belongsTo(Division::class);
    }
}
