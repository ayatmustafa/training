<?php


namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\Section;
use Modules\ConfigModule\Repositories\SectionRepositoryInterface;

// the same comment as in the other repos 
class SectionRepository implements SectionRepositoryInterface
{
    public function index()
    {
        return Section::all();
    }
    public function store($sectionData)
    {
        return Section::create($sectionData->all());
    }
    public function show($section_id)
    {
        return Section::where('id', $section_id)->first();
    }
    public function update($request, $section_id)
    {
        $section = Section::where('id', $section_id)->update($request->all());
        return $section;
    }
    public function getSectionByDivision($division_id)
    {
        return Division::with('Section')->find($division_id);
    }
    public function changeStatus($req)
    {
        $change = Section::where('id', $req->section_id)->first();
        $change->status = $req->status;
        $change->save();
        return $change;
    }
}
