<?php

namespace Modules\Student\Entities;

use Illuminate\Database\Eloquent\Model;

class StudentTranslation extends Model
{
   
    protected $fillable = ['first_name','middle_name','religion','nationality',
    'father_first_name','father_middle_name','father_last_name','father_religion','father_nationality',
    'father_address','mother_first_name','mother_middle_name','mother_last_name','mother_birth_date',
    'mother_religion','mother_nationality','locale','student_id'];
    protected $table = 'students_translations';
    public $timestamps = false;
}
