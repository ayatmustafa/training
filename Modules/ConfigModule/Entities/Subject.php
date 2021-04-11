<?php

namespace Modules\ConfigModule\Entities;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $fillable = ['name'];
    protected $hidden   = ['created_at', 'updated_at'];

    // enhancement wrondname should be divisionSubject()
    public function divisionSubject() {
        return $this->belongsTo(DivisionSubject::class);
    }
}
