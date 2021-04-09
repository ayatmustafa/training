<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Section extends Model implements TranslatableContract
{

    use Translatable;
    protected $fillable = ['status','division_id'];
    protected $hidden  = ['created_at', 'updated_at'];
    public $translatedAttributes = ['name'];

    public function division()
    {
        return $this->belongsTo('Modules\ConfigModule\Entities\Division','division_id');
    }
    public function grades() {
        return $this->hasMany(Grade::class);
    }
    
}
