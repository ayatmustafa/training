<?php

namespace Modules\OnlineClasses\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\OnlineClasses\Entities\OnlineClass;
use Modules\OnlineClasses\Http\Requests\OnlineClassRequest;
use Modules\OnlineClasses\Http\Requests\OnlineClassUpdateRequest;
use Modules\OnlineClasses\Repositories\OnlineClassRepositoryInterface;
use Modules\OnlineClasses\Transformers\OnlineClassResource;
use Modules\OnlineClasses\Traits\ZoomJWT;

class OnlineClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    use ZoomJWT;
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    protected $onlineClass;
    public function __construct(OnlineClassRepositoryInterface $onlineClass)
    {
        $this->onlineClass = $onlineClass;
    }
    public function index(Request $request)
    {
        $getOnlineClass = $this->onlineClass->index($request);
        return response()->json([
            'status' => 'success',
            'date'   => OnlineClassResource::collection($getOnlineClass),
        ]);
    }
    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(OnlineClassRequest $request)
    {
        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'type' => self::MEETING_TYPE_SCHEDULE,
            'start_time' => $this->toZoomTimeFormat($request['class_start_time']),
            'duration' => 40,
            'settings' => [
                'host_video' => false,
                'participant_video' => false,
                'waiting_room' => true,
            ]
        ]);

        $userId = Auth::user()->id;
        $zoom_response = json_decode($response);
        $zoom_online_class = [
            'user_id'         => $userId,
            'zoom_meeting_id' => $zoom_response->id,
            'duration'        => $zoom_response->duration,
            'join_url'        => $zoom_response->join_url
        ];
        $data = array_merge($request->all(), $zoom_online_class);
        $storedOnlineClass = $this->onlineClass->store($data);
        return response()->json([
            'status' => 'success',
            'data'   => $storedOnlineClass !== null ? new OnlineClassResource($storedOnlineClass) : $storedOnlineClass
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
            'data'   => $showOnlineClass !== null ? new OnlineClassResource($showOnlineClass) : $showOnlineClass
        ]);
    }
    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(OnlineClassUpdateRequest $request, $id)
    {
    $onlineClasses = OnlineClass::find($id);
    $path = 'meetings/' . $onlineClasses->zoom_meeting_id;
    $this->zoomPatch($path, [
        'type' => self::MEETING_TYPE_SCHEDULE,
        'zoom_meeting_start_time' => (new \DateTime($request['date'].$request['class_start_time']))->format('Y-m-d'),
        'duration' => 40,
        'settings' => [
            'host_video' => false,
            'participant_video' => false,
            'waiting_room' => true,
        ]
    ]);
     $data = array_merge($request->all(), [
        "user_id"     => Auth::user()->id,
        "start_time" => $request->class_start_time,
    ]);
    $updatedOnlineClass = $this->onlineClass->update($data, $onlineClasses);
    return response()->json([
        'status' => 'success',
        'data'   => $updatedOnlineClass !== null ? new OnlineClassResource($updatedOnlineClass) : $updatedOnlineClass

    ]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $onlineClass = OnlineClass::find($id);
        if($onlineClass !== null) {
            $path = 'meetings/' . $onlineClass->zoom_meeting_id;
            $this->zoomDelete($path);
            $deletedOnlineClass = $this->onlineClass->destroy($onlineClass);
        }
        return response()->json([
            'status' => 'success',
            'message'   => $deletedOnlineClass ?? null
        ]);
    }
}
