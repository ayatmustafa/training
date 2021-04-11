<?php


namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\Grade;
use Modules\ConfigModule\Entities\School;
use Modules\ConfigModule\Http\Requests\GradeRequest;
use Modules\ConfigModule\Repositories\GradeRepositoryInterface;

// rename every thing like in ClassesRepository and dont use un necessary variables like $grade could return the result direct return Grade::create($request->all())
class GradeRepository implements GradeRepositoryInterface
{

   public function createGrade($request)
   {
      $grade = Grade::create($request->all());
      return $grade;
   }
   public function GetAllGrades()
   {
      $grades = Grade::all();
      return $grades;
   }
   public function getGrade($grade_id)
   {
      $grade = Grade::where('id', $grade_id)->first();
      return $grade;
   }
   public function getGradeSection($grade_id)
   {
      $grade=Grade::find($grade_id);
      $section=$grade->section;
      return $section;
   }
   public function AddGradeSection($grade_id,$request)
   {
     $AddSection= Grade::where('id',$grade_id)->update(['section_id'=>$request->section_id]);
      return $AddSection;
   }
   public function updateGrade($gradeData,$grade_id)
   {
      $grade=Grade::find($grade_id);
      $grade->update($gradeData->all());
      return $grade;
   }
}
