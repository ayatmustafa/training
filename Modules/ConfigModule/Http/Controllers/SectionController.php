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

    public function getAllSections()
    {
        $getAllSections = $this->SectionRepository->getAllSections();
        $data = ["status" => "success", "data" => $getAllSections];
        return response()->json($data, 200);
    }
    public function createSection(Request $sectionData)
    {
        $Section = $this->SectionRepository->createSection($sectionData);
        $data = ["status" => "success", "data" => $Section];
        return response()->json($data, 200);
    }
    public function editSection($section_id)
    {
        $Section = $this->SectionRepository->editSection($section_id);
        $data = ["status" => "success", "data" => $Section];
        return response()->json($data, 200);
    }
    public function updateSection(Request $request, $section_id)
    {
        $Section = $this->SectionRepository->updateSection($request, $section_id);
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
