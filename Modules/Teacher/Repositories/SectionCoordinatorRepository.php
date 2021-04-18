<?php


namespace Modules\Teacher\Repositories;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Entities\SectionCoordinator;
use Modules\Teacher\Repositories\SectionCoordinatorRepositoryInterface;

class SectionCoordinatorRepository implements SectionCoordinatorRepositoryInterface
{
 public function store($req)
 {
    $user = Auth::user()->id;
    $section_coordinator=sectioncoordinator::create(array_merge($req->all(), ['user_id' => $user]));
    return  $section_coordinator;
 }
}
