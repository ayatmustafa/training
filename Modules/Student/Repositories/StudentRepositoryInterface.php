<?php
namespace Modules\Student\Repositories;

interface StudentRepositoryInterface
{
    public function create($studentData);
    public function index();
    public function edit($student_id);
    public function Update($student_id,$studentdata);
    public function StudentsInDivision($division_id);
    public function StudentsInSection($section_id);
    public function StudentsInGrade($grade_id);
    public function AddStudentToGrade($id,$req);

}