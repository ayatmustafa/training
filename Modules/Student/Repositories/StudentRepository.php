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
      return Student::create(array_merge($studentData->all(),['user_id'=> $user]));

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
      return    $student; 
    }
    public function StudentsInDivision($division_id)
    {
      return Student::where('division_id', $division_id)->get();
    }
    public function StudentsInSection($section_id)
    { 
        return Student::where('section_id',$section_id)->get();
    }
    public function StudentsInGrade($grade_id)
    {
       return Student::where('grade_id',$grade_id);
    }
    public function AddStudentToGrade($id,$req)
    {
     return Student::where('id',$id)->update(['grade_id'=>$req->grade_id]);
    }
}
