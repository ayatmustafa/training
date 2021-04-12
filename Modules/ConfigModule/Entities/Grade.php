<?php

namespace Modules\ConfigModule\Entities;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\AssignOp\Div;

class Grade extends Model
{

    protected $fillable = ['name','division_id','section_id'];
    protected $table ='grades';
    // enhancement by default it's true no need to do this.

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
    // enhancement wrong function name
//    also  u can use Division::class to get the relative path
    public function division()
    {
        return $this->belongsTo(Division::class,'division_id');
    }

}
