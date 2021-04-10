<?php
namespace Modules\Student\Repositories;

interface StudentRepositoryInterface
{
    public function createStudent($studentData);
    public function getAllStudents();
    public function editStudent($student_id);
    public function UpdateStudent($student_id,$studentdata);
    public function StudentsInDivision($division_id);
    public function StudentsInSection($section_id);
    public function StudentsInGrade($grade_id);
    public function AddStudentToGrade($id,$req);

}