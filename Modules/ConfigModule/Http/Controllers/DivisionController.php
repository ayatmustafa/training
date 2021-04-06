<?php

namespace Modules\ConfigModule\Http\Controllers;
use Modules\ConfigModule\Transformers\DivisionResource;
use Modules\ConfigModule\Repositories\DivisionRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DivisionController extends Controller
{
    protected  $DivisionRepository;
    public function __construct(DivisionRepositoryInterface $DivisionRepository)
    {
        $this->DivisionRepository = $DivisionRepository;
    }
    public function getdivisions()
    {
        $getdivision = $this->DivisionRepository->getdivisions();
        $data = ["status" => "success", "data" =>DivisionResource::collection($getdivision)];
        return response()->json($data, 200);
    }

    public function DivisionByschoolID($school_id)
    {
        $divisions = $this->DivisionRepository->DivisionByschoolID($school_id);
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }
    
    public function createDivision(Request $request)
    {
        $divisions = $this->DivisionRepository->createDivision($request);
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }

    public function editDivisionData($division_id)
    {
        $divisions = $this->DivisionRepository->editDivisionData($division_id);
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }
    public function UpdateDivision(Request $request,$Division_id)
    {
        $divisions = $this->DivisionRepository->UpdateDivision($request,$Division_id);
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }
}
