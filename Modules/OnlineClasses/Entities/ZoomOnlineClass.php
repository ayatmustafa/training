<?php

namespace Modules\OnlineClasses\Entities;

use Illuminate\Database\Eloquent\Model;

class ZoomOnlineClass extends Model
{
    protected $fillable = ["online_class_id", "user_id", "status"];
    public $hidden = ['created_at', 'updated_at'];

    public function onlineClasses() {
        return $this->belongsTo(OnlineClass::class,'online_class_id');
    }
}
