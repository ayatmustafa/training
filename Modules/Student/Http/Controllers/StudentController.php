<?php

namespace Modules\Student\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Student\Http\Requests\StudentRequest;
use Modules\Student\Repositories\StudentRepositoryInterface;
use Modules\Student\Transformers\StudentResource;

class StudentController extends Controller
{
    protected  $StudentRepository;
    public function __construct(StudentRepositoryInterface $StudentRepository)
    {
        $this->StudentRepository = $StudentRepository;
    }
    public function create(StudentRequest $studentData)
    {
        $student = $this->StudentRepository->create($studentData);
        $data = ["status" => "success", "data" =>new StudentResource($student)];
        return response()->json($data, 200);
    }

    public function index()
    {
        $students = $this->StudentRepository->index();
        $data = ["status" => "success", "data" => $students];
        return response()->json($data, 200);
    }
    public function edit($student_id)
    {
        $student = $this->StudentRepository->edit($student_id);
        $data = ["status" => "success", "data" => $student];
        return response()->json($data, 200);
    }
    public function Update($student_id, Request $studentdata)
    {
        $student = $this->StudentRepository->Update($student_id, $studentdata);
        $data = ["status" => "success", "data" => $student];
        return response()->json($data, 200);
    }
    public function StudentsInDivision($division_id)
    {
        $student = $this->StudentRepository->StudentsInDivision($division_id);
        $data = ["status" => "success", "data" => $student];
        return response()->json($data, 200);
    }
    public function StudentsInSection($section_id)
    { 
        $students = $this->StudentRepository->StudentsInSection($section_id);
        $data = ["status" => "success", "data" => $students];
        return response()->json($data, 200);
    }

    public function StudentsInGrade($grade_id)
    {
        $students = $this->StudentRepository->StudentsInSection($grade_id);
        $data = ["status" => "success", "data" => $students];
        return response()->json($data, 200);
    }
    public function AddStudentToGrade($id,$req)
    {
        $students = $this->StudentRepository->AddStudentToGrade($id,$req);
        $data = ["status" => "success", "data" => $students];
        return response()->json($data, 200);
    }
}
