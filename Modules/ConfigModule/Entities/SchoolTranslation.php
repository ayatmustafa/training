<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
class SchoolTranslation extends Model
{
    protected $table = "schools_translations";
    protected $fillable = ['school_id', 'long_name', 'short_name','address','branch_name', 'locale'];
    protected $hidden   = ['created_at', 'updated_at'];
}
