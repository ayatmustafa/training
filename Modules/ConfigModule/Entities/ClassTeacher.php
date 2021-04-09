<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class ClassTeacher extends Model
{
    protected $fillable = ['teacher_id ', 'class_id'];
    protected $hidden = ['created_at', 'updated_at'];
}
