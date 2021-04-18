<?php

namespace Modules\Teacher\Entities;

use Illuminate\Database\Eloquent\Model;

class SectionCoordinator extends Model
{
     protected $fillable = ['section_id','user_id'];
     protected $table='sectioncoordinators';
     public function agendas()
    {
        return $this->belongsToMany(ِAgenda::class, "agenda_sectionCoordinadors",'sectionCoordinator_id','agenda_id');
    }
}
