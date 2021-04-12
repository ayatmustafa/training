<?php
namespace Modules\ConfigModule\Repositories;

interface GradeRepositoryInterface
{
    // rename every thing like in ClassesRepositoryInterface

    public function index();
    public function store($request);
    public function show($grade_id);
    public function update($gradeData,$grade_id);
    public function getGradeSection($grade_id);
    public function addGradeSection($grade_id,$request);


}
