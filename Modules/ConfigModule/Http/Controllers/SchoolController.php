<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
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
        $userId = Auth::user()->id;
        $data = array_merge($request->all(), ['user_id'=> $userId]);
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
            'data'   => $getSchools !== null ? new SchoolResource($getSchools) : $getSchools
        ]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateSchoolRequest $request, $id)
    {
        $updatedSchool =  $this->schoolRepo->update($request, $id);
        return response()->json([
            'status' => 'success',
            'data'   => $updatedSchool !== null ? new SchoolResource($updatedSchool) : $updatedSchool
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deletedSchool =  $this->schoolRepo->destroy($id);  
        return response()->json([
            'status' => 'success',
            'data'   => $deletedSchool
        ]);
    }
}
