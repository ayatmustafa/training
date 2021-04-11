<?php

namespace Modules\Student\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Modules\ConfigModule\Entities\Classes;

class Student extends Model implements TranslatableContract
{
    use Translatable;

    protected $fillable = ['gender','father_contact_mobile','father_contact_telephone',
    'father_contact_email_official','father_birth_date','father_occupation','mother_contact_mobile',
    'mother_contact_email_official','official_email','mother_birth_date','mother_occupation',
    'division_id','grade_id','school_id','user_id','birth_date','code','section_id'];
   
   
    public $translatedAttributes = ['first_name','middle_name','gender','religion',
    'nationality','father_first_name','father_middle_name','father_last_name',
    'father_religion','father_nationality','father_address','mother_first_name',
    'mother_middle_name','mother_last_name',
    'mother_religion','mother_nationality','locale','student_id'];

   protected $table ='students';
   public function Division()
   {
       return $this->belongsTo('Modules\ConfigModule\Entities\Division','division_id');
   }
   public function grade()
   {
       return $this->belongsTo('Modules\ConfigModule\Entities\Grade','grade_id');
   }
   public function user() {
    return $this->belongsTo(User::class);
   }
   public function sections()
   {
       return $this->belongsTo('Modules\ConfigModule\Entities\section');
   }
   public function class() {
       return $this->belongsTo(Classes::class);
   }
}
