<?php

namespace Modules\ConfigModule\Entities;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{

    protected $fillable = ['name','division_id','section_id'];
    protected $table ='grades';
    public $timestamps = true;

    public function section()
    {
        return $this->belongsTo('Modules\ConfigModule\Entities\Section');
    }
    public function Division()
    {
        return $this->belongsTo('Modules\ConfigModule\Entities\Division');
    }
    
}
