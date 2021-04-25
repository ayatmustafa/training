<?php

namespace Modules\Teacher\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Teacher\Http\Requests\SectionCoordinatorRequest;
use Modules\Teacher\Repositories\SectionCoordinatorRepositoryInterface;

class TeacherController extends Controller
{
    protected  $SectionCoordinatorRepository;
    public function __construct(SectionCoordinatorRepositoryInterface $SectionCoordinatorRepository)
    {
        $this->SectionCoordinatorRepository = $SectionCoordinatorRepository;
    }
    public function store(SectionCoordinatorRequest $req)
    {
        $SectionCoordinator = $this->SectionCoordinatorRepository->store($req);
        $data = ["status" => "success", "data" => $SectionCoordinator];
        return response()->json($data, 200);
    }
    public function show($id)
    {
        $SectionCoordinator = $this->SectionCoordinatorRepository->show($id);
        $data = ["status" => "success", "data" => $SectionCoordinator];
        return response()->json($data, 200);
    }
    public function update($id,SectionCoordinatorRequest $req)
    {
        $SectionCoordinator = $this->SectionCoordinatorRepository->update($id, $req);
        $data = ["status" => "success", "data" => $SectionCoordinator];
        return response()->json($data, 200);
    }
    public function destroy($id)
    {
        $SectionCoordinator = $this->SectionCoordinatorRepository->destroy($id);
        $data = ["status" => "success", "data" => $SectionCoordinator];
        return response()->json($data, 200);
    }
}
