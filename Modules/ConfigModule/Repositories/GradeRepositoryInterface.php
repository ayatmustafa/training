<?php
namespace Modules\ConfigModule\Repositories;

interface GradeRepositoryInterface
{
    // rename every thing like in ClassesRepositoryInterface

    public function createGrade($request);
    public function GetAllGrades();
    public function getGrade($grade_id);
    public function getGradeSection($grade_id);
    public function AddGradeSection($grade_id,$request);
    public function updateGrade($gradeData,$grade_id);


}
