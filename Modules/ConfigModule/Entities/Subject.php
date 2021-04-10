<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];
    protected $hidden   = ['created_at', 'updated_at'];

    public function division_subject() {
        return $this->belongsTo(DivisionSubject::class);
    }
}
