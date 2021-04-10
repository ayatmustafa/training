<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
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
    protected $divisionSubject;
    public function __construct(DivisionSubjectRepositoryInterface $divisionSubject)
    {
        $this->divisionSubject = $divisionSubject;
    }
    public function index()
    {
        $getDivisionSubjects = $this->divisionSubject->index();
        return response()->json([
            "status" => "success",
            "data"   =>  DivisionSubjectResource::collection($getDivisionSubjects)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('configmodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(DivisionSubjectRequest $request)
    {
        $storeDivisionSubject = $this->divisionSubject->store($request);
        return response()->json([
            "status" => "success",
            "data"   =>  new DivisionSubjectResource($storeDivisionSubject)
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $showDivisionSubject = $this->divisionSubject->show($id);
        return response()->json([
            "status" => "status",
            "data"   =>   $showDivisionSubject !== null ? new DivisionSubjectResource($showDivisionSubject) : $showDivisionSubject
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('configmodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(DivisionSubjectUpdateRequest $request, $id)
    {
        $updateDivisionSubject = $this->divisionSubject->update($request, $id);
        return response()->json([
            "status" => "status",
            "data"   => new DivisionSubjectResource($updateDivisionSubject)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deleteDivisionSubject = $this->divisionSubject->destroy($id);
        return response()->json([
            "status" => "status",
            "message"   => $deleteDivisionSubject
        ]);
    }
}
