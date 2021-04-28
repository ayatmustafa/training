<?php

namespace Modules\OnlineClasses\Repositories;

use DateTime;
use Illuminate\Support\Facades\Notification;
use Modules\OnlineClasses\Repositories\OnlineClassRepositoryInterface;
use Modules\OnlineClasses\Entities\OnlineClass;
use Modules\OnlineClasses\Notifications\NotifyStudentOfNewOnlineClass;

class OnlineClassRepository implements OnlineClassRepositoryInterface
{
    protected $onlineClass;
    public function __construct(OnlineClass $onlineClass)
    {
        $this->onlineClass = $onlineClass;
    }
    public function index($request) {
        $start_date = date($request->start_date);
        $end_date   = date($request->end_date);
        if($request->start_date != null && $request->end_date != null) {
            return  $this->onlineClass->WhereBetween('date', [$start_date, $end_date])
            ->get();
        }
        return  $this->onlineClass->get();
    }
    public function show($id) {
        return $this->onlineClass->find($id);
    }
    public function store($data) {
        $onlineClasses = $this->onlineClass->create($data);
        $onlineClasses->subjects->name;
        $onlineClasses->zoomOnlineClasses()->create([
            "user_id"        => $data['user_id'],
            "status"         => $onlineClasses->status === 1 ? "active" : "archived"
        ]);
        $students = $onlineClasses->class->students->pluck('user');
        $d = new DateTime($data['date']);
        $onlineClassNotificationDetails = [
            'greeting' => 'HELLO',
            'teacher'  => $onlineClasses->class->user->name,
            'body'     => $onlineClasses->subjects->name.' Online class starting at '.$d->format('l Y m d').' '.$data['class_start_time'],
            'join_url' => $data['join_url'],
            'thanks'   => 'thank you.',
            'action'   => url('/'),
        ];
        Notification::send($students, new NotifyStudentOfNewOnlineClass($onlineClassNotificationDetails));
        return $onlineClasses;
    }
    public function update($data, $onlineClasses) {
        if($onlineClasses !== null) {
            $onlineClasses->update($data);
            $onlineClasses->zoomOnlineClasses()->update(['status' =>  $onlineClasses->status === 1 ? "active" : "archived"]);
        return $onlineClasses;
        }
    }
    public function destroy($onlineClass) {
        return $onlineClass->delete();
    }
}
