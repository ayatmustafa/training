<?php

namespace Modules\Config\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Modules\Config\Entities\SchoolTranslation;

class School extends Model implements TranslatableContract
{
    use Translatable;
    protected $fillable = ['user_id', 'lat', 'lng', 'contacts'];
    public $hidden = ['created_at', 'updated_at'];
    public $translatedAttributes = ['long_name', 'short_name', 'branch_name', 'address'];
    protected $casts = [
        'contacts' => 'array'
    ];
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function schoolTranslations() {
        return $this->hasMany(SchoolTranslation::class);
    }

}
