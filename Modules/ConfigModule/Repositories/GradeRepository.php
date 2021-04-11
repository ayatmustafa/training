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

   public function store($request)
   {
      return Grade::create($request->all());
   }
   public function index()
   {
      return Grade::all();
   }
   public function show($grade_id)
   {
      return Grade::where('id', $grade_id)->first();
   }
   public function getGradeSection($grade_id)
   {
      $grade=Grade::find($grade_id);
      $section=$grade->section;
      return $section;
   }
   public function addGradeSection($grade_id,$request)
   {
     $AddSection= Grade::where('id',$grade_id)->update(['section_id'=>$request->section_id]);
      return $AddSection;
   }
   public function update($gradeData,$grade_id)
   {
      $grade=Grade::find($grade_id);
      $grade->update($gradeData->all());
      return $grade;
   }
}
