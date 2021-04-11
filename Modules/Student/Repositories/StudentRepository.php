<?php


namespace Modules\Student\Repositories;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Entities\Division;
use Modules\Student\Repositories\StudentRepositoryInterface;
use Modules\Student\Entities\Student;

class StudentRepository implements StudentRepositoryInterface
{
  public function create($studentData)
  {
    $user = Auth::user()->id;
    $student=Student::create(array_merge($studentData->all(), ['user_id' => $user]));
    return  $student;
  }
  public function index()
  {
    return Student::all();
  }
  public function edit($student_id)
  {

    return Student::where('id', $student_id)->first();
  }
  public function Update($student_id, $studentdata)
  {
    $student = Student::where('id', $student_id)->first();
    $student->update($studentdata->all());
     return $student;
  }
  public function StudentsInDivision($division_id)
  {
    $student = Student::where('division_id', $division_id)->get();
    return    $student;
  }
  public function StudentsInSection($section_id)
  {
    $student = Student::where('section_id', $section_id)->get();
    return  $student;
  }
  public function StudentsInGrade($grade_id)
  {
    $student = Student::where('grade_id', $grade_id);
    return  $student;
  }
  public function AddStudentToGrade($id, $req)
  {
    $student = Student::where('id', $id)->update(['grade_id' => $req->grade_id]);
    return $student;
  }
}
