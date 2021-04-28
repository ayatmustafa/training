<?php

namespace Modules\OnlineClasses\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Modules\ConfigModule\Entities\AcademicClass;
use Modules\ConfigModule\Entities\Subject;
use Modules\Student\Entities\Student;

class OnlineClass extends Model
{

    protected $fillable = [
        "date",
        "class_start_time",
        "class_end_time",
        "user_id",
        "academic_class_id",
        "subject_id",
        "status",
        "zoom_meeting_id",
        "duration"
    ];
    public $hidden = ['created_at', 'updated_at'];
    protected $casts = [
        "status" => "array"
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function zoomOnlineClasses() {
        return $this->hasOne(ZoomOnlineClass::class);
    }
    public function class() {
        return $this->belongsTo(AcademicClass::class, 'academic_class_id');
    }
    public function subjects() {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
}
