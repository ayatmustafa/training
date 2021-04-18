<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Http\Requests\AcademicClassRequest;
use Modules\ConfigModule\Http\Requests\AcademicClassUpdateRequest;
use Modules\ConfigModule\Repositories\AcademicClassRepositoryInterface;
use Modules\ConfigModule\Transformers\AcademicClassResource;

//enhancement controller name should be singular like model name (ClassController)
class AcademicClassController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // variable should be more descriptive like classesRepository
    protected $academicClassesRepository;
    public function __construct(AcademicClassRepositoryInterface $academicClassesRepository)
    {
     $this->academicClassesRepository = $academicClassesRepository;
    }
    public function index()
    {
        $classesRepository= $this->academicClassesRepository->index();
        return response()->json([
            'status' => 'success',
            'data'   => AcademicClassResource::collection($classesRepository)
        ]);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
public function store(AcademicClassRequest $request)
    {
        // enhancement renaame the var to $storedClass
        $userId = Auth::user()->id;
        $data = array_merge($request->all(),["user_id" => $userId]);
        $storedAcademicClass = $this->academicClassesRepository->store($data);
        return response()->json([
            'status' => 'success',
            'data'   => new AcademicClassResource($storedAcademicClass)
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $getAcademicClass = $this->academicClassesRepository->show($id);
        return response()->json([
            'status' => 'success',
            'data'   => $getAcademicClass !== null ? new AcademicClassResource($getAcademicClass) : $getAcademicClass
        ]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(AcademicClassUpdateRequest $request, $id)
    {
        $updatedAcademicClass = $this->academicClassesRepository->update($request, $id);
        return response()->json([
            'status' => 'success',
            'data'   => $updatedAcademicClass !==null ? new AcademicClassResource($updatedAcademicClass) : $updatedAcademicClass,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deletedAcademicClass = $this->academicClassesRepository->destroy($id);
        return response()->json([
            'status' => 'success',
            'data'   => $deletedAcademicClass,
        ]);
    }
}
