<?php


namespace Modules\OnlineClasses\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Modules\OnlineClasses\Repositories\OnlineClassRepositoryInterface;
use Modules\OnlineClasses\Entities\OnlineClass;
use Modules\OnlineClasses\Entities\ZoomOnlineClass;
use Modules\OnlineClasses\Traits\ZoomJWT;

class OnlineClassRepository implements OnlineClassRepositoryInterface
{
    use ZoomJWT;
    const MEETING_TYPE_INSTANT = 1;
    const MEETING_TYPE_SCHEDULE = 2;
    const MEETING_TYPE_RECURRING = 3;
    const MEETING_TYPE_FIXED_RECURRING_FIXED = 8;
    protected $onlineClass;
    public function __construct(OnlineClass $onlineClass)
    {
        $this->onlineClass = $onlineClass;
    }

    public function index($request) {
        $start_date = date($request->start_date);
        $end_date = date($request->end_date);
        if($request->start_date != null && $request->end_date != null) {
            return  $this->onlineClass->WhereBetween('date',[$start_date, $end_date])
            ->get();
        }
        return  $this->onlineClass->get();
        
    }
    public function show($id) {
        return $this->onlineClass->find($id);
    }
    public function store($request) {    
        $path = 'users/me/meetings';
        $response = $this->zoomPost($path, [
            'type' => self::MEETING_TYPE_SCHEDULE,
            'class_start_time' => $this->toZoomTimeFormat($request['class_start_time']),
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
        ];
        
        $data = array_merge($request->all(), $zoom_online_class);
        $onlineClasses = $this->onlineClass->create($data);
        $onlineClasses->zoomOnlineClasses()->create([
            "user_id"        => $userId,
            "status"         => $zoom_response->status
        ]);
        return $onlineClasses;
    }
    public function update($request,$id) {
        $onlineClass = $this->onlineClass->find($id);
        if($onlineClass !== null)
            return $onlineClass->update($request->all());
        return "not exists";
    }
    public function destroy($id) {
        $onlineClass = $this->onlineClass->find($id);
        if($onlineClass !== null) {
            $path = 'meetings/' . $onlineClass->zoom_meeting_id;
            $this->zoomDelete($path);
            return $onlineClass->delete();
        }
        return "not exists";
    }
}
