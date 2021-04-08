<?php


namespace Modules\Student\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Entities\Division;
use Modules\Student\Repositories\StudentRepositoryInterface;
use Modules\Student\Entities\Student;

class StudentRepository implements StudentRepositoryInterface
{
    public function createStudent($studentData)
    {
        $user = Auth::user()->id;
        $student = create(array_merge($studentData->all(), $user));
        return $student;
    }
    public function getAllStudents()
    {
        $students = Student::all();
        return $students;
    }
    public function editStudent($student_id)
    {
        //    $student=Student::find($student_id);
        //    return $student;
        $student = Student::where('id', $student_id)->first();
        return $student;
    }
    public function UpdateStudent($student_id, $studentdata)
    {
        $student = Student::where('id', $student_id)->first();
        $student->update($studentdata->all());
        return $student;
    }
    public function StudentsInDivision($division_id)
    {
        $students = Student::where('division_id', $division_id)->get();
        return $students;
    }
    public function StudentsInSection($section_id)
    { 
        $students=Student::where('section_id',$section_id)->get();
        return $students;
    }
    public function StudentsInGrade($grade_id)
    {
        $students=Student::where('grade_id',$grade_id);
        return $students;
    }
    public function AddStudentToGrade($id,$req)
    {
    $student=Student::where('id',$id)->update(['grade_id'=>$req->grade_id]);
    return $student;
    }
}
