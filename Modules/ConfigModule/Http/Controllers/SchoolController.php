<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Entities\School;
use Modules\ConfigModule\Http\Requests\SchoolRequest;
use Modules\ConfigModule\Http\Requests\UpdateSchoolRequest;
use Modules\ConfigModule\Repositories\SchoolRepositoryInterface;
use Modules\ConfigModule\Transformers\SchoolResource;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $schoolRepo;
    public function __construct(SchoolRepositoryInterface $schoolRepo)
    {
        $this->schoolRepo = $schoolRepo;
    }
    public function index()
    {
        $response = $this->schoolRepo->index();
        // enhancement remove the commented code
        return response()->json([
            'status' => 'success',
            // 'data'   => $response
            'data'   => SchoolResource::collection($response)
        ]);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(SchoolRequest $request)
    {
        $data = array_merge($request->all(), ['user_id'=> Auth::user()->id]);
        $storedSchool = $this->schoolRepo->store($data);
        return response()->json([
            'status' => 'success',
            'data'   => new SchoolResource($storedSchool)
        ]);
    } // end store method

        /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $getSchools =  $this->schoolRepo->show($id);
        return response()->json([
            'status' => 'success',
            'data'   => new SchoolResource($getSchools)
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateSchoolRequest $request,School $school)
    {
        return $request->all();
        $updatedSchool =  $this->schoolRepo->update($request, $school);
        return response()->json([
            'status' => 'success',
            'data'   => $updatedSchool
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(School $school)
    {
        $deletedSchool =  $this->schoolRepo->destroy($school);
        return response()->json([
            'status' => 'success',
            'data'   => $deletedSchool
        ]);
    }
}
