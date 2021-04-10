<?php

namespace Modules\OnlineClasses\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\OnlineClasses\Http\Requests\OnlineClassRequest;
use Modules\OnlineClasses\Http\Requests\OnlineClassUpdateRequest;
use Modules\OnlineClasses\Repositories\OnlineClassRepositoryInterface;
use Modules\OnlineClasses\Transformers\OnlineClassResource;

class OnlineClassController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $onlineClass;
    public function __construct(OnlineClassRepositoryInterface $onlineClass)
    {
        $this->onlineClass = $onlineClass;
    }
    public function index(Request $request)
    {
        $onlineClass = $this->onlineClass->index($request);
        return response()->json([
            'status' => 'success',
            'date'   => OnlineClassResource::collection($onlineClass),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('onlineclasses::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(OnlineClassRequest $request)
    {
        $storeOnlineClass = $this->onlineClass->store($request);
        return response()->json([
            'status' => 'success',
            // 'data'   => $storeOnlineClass
            'data'   => new OnlineClassResource($storeOnlineClass)
        ]);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $showOnlineClass = $this->onlineClass->show($id);
        return response()->json([
            'status' => 'success',
            'data'   => new OnlineClassResource($showOnlineClass)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('onlineclasses::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(OnlineClassUpdateRequest $request, $id)
    {
        $updateOnlineClass = $this->onlineClass->update($request, $id);
        return response()->json([
            'status' => 'success',
            // 'data'   => $updateOnlineClass
            'data'   => new OnlineClassResource($updateOnlineClass)
            
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $deleteOnlineClass = $this->onlineClass->destroy($id);
        return response()->json([
            'status' => 'success',
            'message'   => $deleteOnlineClass
        ]);
    }
}
