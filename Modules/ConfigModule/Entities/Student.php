<?php

namespace Modules\ConfigModule\Entities;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

use Illuminate\Database\Eloquent\Model;

class student extends Model
{
  
    use Translatable;

    protected $fillable = ['gender','father_contact_mobile','father_contact_telephone',
    'father_contact_email_official','father_birth_date','father_occupation','mother_contact_mobile',
    'mother_contact_email_official','official_email','mother_birth_date','mother_occupation',
    'division_id','grade_id','school_id','user_id','birth_date'];

   protected $table ='students';
   public function Division()
   {
       return $this->belongsTo('Modules\ConfigModule\Entities\Division','division_id');
   }
   public function grade()
   {
       return $this->belongsTo('Modules\ConfigModule\Entities\Grade','grade_id');
   }
   public function User()
   {
       return $this->belongsTo('App\Models\User');
   }
}
