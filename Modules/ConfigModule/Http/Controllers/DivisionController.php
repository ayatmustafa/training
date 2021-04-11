<?php

namespace Modules\ConfigModule\Http\Controllers;
use Modules\ConfigModule\Transformers\DivisionResource;
use Modules\ConfigModule\Repositories\DivisionRepositoryInterface;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DivisionController extends Controller
{
    // you should use  the crud function names provided by make:controller artisan command like index() create() store() have a look on ClassesController
    // also rename all the repo and repo interface functions
    // enhancement wrong name variable
    protected  $DivisionRepository;
    public function __construct(DivisionRepositoryInterface $DivisionRepository)
    {
        $this->DivisionRepository = $DivisionRepository;
    }
    // enhancement wrong name should be index()
    public function getdivisions()
    {
        $getdivision = $this->DivisionRepository->getdivisions();
        $data = ["status" => "success", "data" =>DivisionResource::collection($getdivision)];
        return response()->json($data, 200);
    }

    // enhancement wrong name divisionBySchoolId
    public function DivisionByschoolID($school_id)
    {
        $divisions = $this->DivisionRepository->DivisionByschoolID($school_id);
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }


    // enhancement wrong name create()
    public function createDivision(Request $request)
    {
        $divisions = $this->DivisionRepository->createDivision($request);
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }

    // enhancement wrong name edit()
    public function editDivisionData($division_id)
    {
        $divisions = $this->DivisionRepository->editDivisionData($division_id);
        // enhancement no need to define variable data we can return this array in json(["status" => "success", "data" => $divisions])
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }
    // enhancement wrong name should be update
    public function UpdateDivision(Request $request,$Division_id)
    {

        $divisions = $this->DivisionRepository->UpdateDivision($request,$Division_id);
        $data = ["status" => "success", "data" => $divisions];
        return response()->json($data, 200);
    }
}
