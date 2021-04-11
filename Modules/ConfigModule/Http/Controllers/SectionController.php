<?php

namespace Modules\ConfigModule\Http\Controllers;

use Modules\ConfigModule\Repositories\SectionRepositoryInterface;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

// enhancement rename all vars and functions like in ClassesController
class SectionController extends Controller
{
    protected  $SectionRepository;
    public function __construct(SectionRepositoryInterface $SectionRepository)
    {
        $this->SectionRepository = $SectionRepository;
    }

    public function index()
    {
        $getAllSections = $this->SectionRepository->index();
        $data = ["status" => "success", "data" => $getAllSections];
        return response()->json($data, 200);
    }
    public function store(Request $sectionData)
    {
        $Section = $this->SectionRepository->store($sectionData);
        $data = ["status" => "success", "data" => $Section];
        return response()->json($data, 200);
    }
    public function show($section_id)
    {
        $Section = $this->SectionRepository->show($section_id);
        $data = ["status" => "success", "data" => $Section];
        return response()->json($data, 200);
    }
    public function update(Request $request, $section_id)
    {
        $Section = $this->SectionRepository->update($request, $section_id);
        $data = ["status" => "success", "data" => $Section];
        return response()->json($data, 200);
    }
    public function getSectionByDivision($division_id)
    {
        $Section = $this->SectionRepository->getSectionByDivision($division_id);
        $data = ["status" => "success", "data" => $Section];
        return response()->json($data, 200);
    }
    public function changeStatus(Request $status)
    {
        $Section = $this->SectionRepository->changeStatus($status);
        $data = ["status" => "success", "data" => $Section];
        return response()->json($data, 200);
    }
}
