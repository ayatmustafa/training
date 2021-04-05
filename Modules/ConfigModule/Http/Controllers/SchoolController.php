<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
        return response()->json([
            'status' => 'success',
            // 'data'   => $response,
            'data'   => SchoolResource::collection($response)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('config::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(SchoolRequest $request)
    {
        $school = $this->schoolRepo->store($request);
        return response()->json([
            'status' => 'success',
            'data'   => new SchoolResource($school)
        ]);
    } // end store method

        /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show()
    {
        $school =  $this->schoolRepo->show();
        return response()->json([
            'status' => 'success',
            'data'   => SchoolResource::collection($school)
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function getSchool(School $school)
    {
        $school =  $this->schoolRepo->getSchool($school);
        return response()->json([
            'status' => 'success',
            'data'   => new SchoolResource($school)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(School $school)
    {
        return response()->json([
            'status' => 'success',
            'data'   => new SchoolResource($school)
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
        $school =  $this->schoolRepo->update($request, $school);
        return response()->json([
            'status' => 'success',
            'data'   => $school
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(School $school)
    {
        
        $school =  $this->schoolRepo->destroy($school);
        return response()->json([
            'status' => 'success',
            'data'   => $school
        ]);
    }
}
