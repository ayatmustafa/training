<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Repositories\SchoolRepositoryInterface;
use Modules\ConfigModule\Repositories\SchoolRepository;
use Modules\ConfigModule\Entities\School;
use Modules\ConfigModule\Http\Requests\ConfigModuleRequest;

class SchoolController extends Controller
{
    protected  $SchoolRepository;
    public function __construct(SchoolRepositoryInterface $SchoolRepository)
    {
        $this->SchoolRepository = $SchoolRepository;
    }
    public function getSchools()
    {
      //  dd("gg");
        $getSchools = $this->SchoolRepository->getSchools();
        $data = ["status" => "success", "data" => $getSchools];
        return response()->json($data, 200);
    }
    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function CreateSchool(ConfigModuleRequest $schooldata)
    {
    
        $CreateSchool = $this->SchoolRepository->CreateSchool($schooldata);
        $data = ["status" => "success", "data" => $CreateSchool];
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function editSchoolData($school_id) 
   {  
        $EditSchool = $this->SchoolRepository->editSchoolData($school_id);
        $data = ["status" => "success", "data" => $EditSchool];
        return response()->json($data, 200);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    

    public function UpdateSchool($school_id,Request $request)
    {
        // $request->validate([
        // 'name'    => 'required|string',
        // 'address'    => 'required|string'
        // ]);
        $UpdateSchool = $this->SchoolRepository->UpdateSchool($school_id,$request);
        $data = ["status" => "success", "data" => $UpdateSchool];
        return response()->json($data, 200);

    }


    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function deleteSchool($school_id)
    {
        $deleteSchool = $this->SchoolRepository->deleteSchool($school_id);
        $data = ["status" => "success", "data" => $deleteSchool];
        return response()->json($data, 200);

    }
}
