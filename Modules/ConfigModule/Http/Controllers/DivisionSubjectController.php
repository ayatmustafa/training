<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Http\Requests\DivisionSubjectRequest;
use Modules\ConfigModule\Http\Requests\DivisionSubjectUpdateRequest;
use Modules\ConfigModule\Repositories\DivisionSubjectRepositoryInterface;
use Modules\ConfigModule\Transformers\DivisionSubjectResource;

class DivisionSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    // enhancement wrong name should be divisionSubjectRepo
    protected $divisionSubjectRepo;
    public function __construct(DivisionSubjectRepositoryInterface $divisionSubjectRepo)
    {
        $this->divisionSubjectRepo = $divisionSubjectRepo;
    }
    public function index()
    {
        $getDivisionSubjects = $this->divisionSubjectRepo->index();
        return response()->json([
            "status" => "success",
            "data"   =>  DivisionSubjectResource::collection($getDivisionSubjects)
        ]);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DivisionSubjectRequest $request)
    {
        $userId = Auth::user()->id;
        $data = array_merge($request->all(),["user_id" => $userId]);
        $storedDivisionSubject = $this->divisionSubjectRepo->store($data);
        return response()->json([
            "status" => "success",
            "data"   => $storedDivisionSubject  !== null ? new DivisionSubjectResource($storedDivisionSubject) : $storedDivisionSubject
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $showDivisionSubject = $this->divisionSubjectRepo->show($id);
        return response()->json([
            "status" => "status",
            "data"   =>   $showDivisionSubject !== null ? new DivisionSubjectResource($showDivisionSubject) : $showDivisionSubject
        ]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(DivisionSubjectUpdateRequest $request, $id)
    {
        $updatedDivisionSubject = $this->divisionSubjectRepo->update($request, $id);
        return response()->json([
            "status" => "status",
            "data"   => $updatedDivisionSubject !== null ? new DivisionSubjectResource($updatedDivisionSubject) : $updatedDivisionSubject
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deletedDivisionSubject = $this->divisionSubjectRepo->destroy($id);
        return response()->json([
            "status" => "status",
            "message"   => $deletedDivisionSubject
        ]);
    }
}
