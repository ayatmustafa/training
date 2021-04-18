<?php

namespace Modules\Teacher\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\AcademicClass;

class Agenda extends Model
{
   

    protected $fillable = ['name','document','user_id','section_id'];
    

    public function academicClasses()
    {
        return $this->belongsToMany(AcademicClass::class,'AgendaClasses','agenda_id','academic_class_id');
    }

    

    public function sectionCoordinators()
    {
        return $this->belongsToMany(SectionCoordinator::class,'agenda_sectioncoordinadors','agenda_id','sectionCoordinator_id','id','id');
    }

  public function user()
  {
      return $this->belongsTo(User::class);
  }
}
