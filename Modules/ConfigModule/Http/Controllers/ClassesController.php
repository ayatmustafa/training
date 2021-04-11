<?php

namespace Modules\ConfigModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\ConfigModule\Http\Requests\ClassesRequest;
use Modules\ConfigModule\Http\Requests\ClassesUpdateRequest;
use Modules\ConfigModule\Repositories\ClassesRepositoryInterface;
use Modules\ConfigModule\Transformers\ClassesResource;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $classes;
    public function __construct(ClassesRepositoryInterface $classes)
    {
     $this->classes = $classes;   
    }
    public function index()
    {
        $classes= $this->classes->index();
        return response()->json([
            'status' => 'success',
            'data'   => ClassesResource::collection($classes)
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
public function store(ClassesRequest $request)
    {
        $storeClass = $this->classes->store($request);
        return response()->json([
            'status' => 'success',
            'data'   => new ClassesResource($storeClass)
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $getClass = $this->classes->show($id);
        return response()->json([
            'status' => 'success',
            'data'   => new ClassesResource($getClass)
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
    public function update(ClassesUpdateRequest $request, $id)
    {
        $updateClass = $this->classes->update($request, $id);
        return response()->json([
            'status' => 'success',
            'data'   => $updateClass,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $updateClass = $this->classes->destroy($id);
        return response()->json([
            'status' => 'success',
            'data'   => $updateClass,
        ]);
    }
}
