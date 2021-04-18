<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ClassTeacher extends Model
{
    protected $fillable = ['teacher_id ', 'academic_class_id'];
    protected $hidden = ['created_at', 'updated_at'];

    public function teacher() {
        return $this->belongsTo(Teacher::class, 'teacher_id');
    }
}
