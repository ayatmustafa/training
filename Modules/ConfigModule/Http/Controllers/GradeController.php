<?php

namespace Modules\ConfigModule\Http\Controllers;

use Modules\ConfigModule\Repositories\GradeRepositoryInterface;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Http\Requests\GradeRequest;
use Modules\ConfigModule\Transformers\GradeResource;

class GradeController extends Controller
{
    // enhancement rename all variables and functions names have a look on ClassesController

    protected  $GradeRepository;
    public function __construct(GradeRepositoryInterface $GradeRepository)
    {
        $this->GradeRepository = $GradeRepository;
    }
    public function createGrade(GradeRequest $request)
    {
        $grade = $this->GradeRepository->createGrade($request);
        $data = ["status" => "success", "data" => new GradeResource($grade)];
        return response()->json($data, 200);
    }
    public function GetAllGrades()
    {
        $grade = $this->GradeRepository->GetAllGrades();
        $data = ["status" => "success", "data" => GradeResource::collection($grade)];
        return response()->json($data, 200);
    }
    public function getGrade($grade_id)
    {
        $grade = $this->GradeRepository->getGrade($grade_id);
        $data = ["status" => "success", "data" => new GradeResource($grade)];
        return response()->json($data, 200);
    }
    public function getGradeSection($grade_id)
    {
        $grade = $this->GradeRepository->getGradeSection($grade_id);
        $data = ["status" => "success", "data" => ($grade)];
        return response()->json($data, 200);
        //new GradeResource
    }
    public function AddGradeSection($grade_id,Request $request)
    {
        $grade = $this->GradeRepository->AddGradeSection($grade_id, $request);
        $data = ["status" => "success", "data" => ($grade)];
        return response()->json($data, 200);
    }
    public function updateGrade(GradeRequest $gradeData,$grade_id)
    {
        $grade = $this->GradeRepository->updateGrade($gradeData,$grade_id);
        $data = ["status" => "success", "data" =>new GradeResource($grade)];
        return response()->json($data, 200);
    }
}
