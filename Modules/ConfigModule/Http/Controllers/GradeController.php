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
    public function store(GradeRequest $request)
    {
        $grade = $this->GradeRepository->store($request);
        $data = ["status" => "success", "data" => new GradeResource($grade)];
        return response()->json($data, 200);
    }
    public function index()
    {
        $grade = $this->GradeRepository->index();
        $data = ["status" => "success", "data" => GradeResource::collection($grade)];
        return response()->json($data, 200);
    }
    public function show($grade_id)
    {
        $grade = $this->GradeRepository->show($grade_id);
        $data = ["status" => "success", "data" => new GradeResource($grade)];
        return response()->json($data, 200);
    }
    public function getGradeSection($grade_id)
    {
        $grade = $this->GradeRepository->getGradeSection($grade_id);
        $data = ["status" => "success", "data" => ($grade)];
        return response()->json($data, 200);
    }
    public function addGradeSection($grade_id,Request $request)
    {
        $grade = $this->GradeRepository->addGradeSection($grade_id, $request);
        $data = ["status" => "success", "data" => ($grade)];
        return response()->json($data, 200);
    }
    public function update(GradeRequest $gradeData,$grade_id)
    {
        $grade = $this->GradeRepository->update($gradeData,$grade_id);
        $data = ["status" => "success", "data" =>new GradeResource($grade)];
        return response()->json($data, 200);
    }
}
