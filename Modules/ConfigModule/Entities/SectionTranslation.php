<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;


class SectionTranslation extends Model
{
    protected $fillable = ['name','section_id','locale'];
    protected $table = 'Sections_translations';
    protected $hidden  = ['created_at', 'updated_at'];
    public $timestamps = false;
}
