<?php


namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\Section;
use Modules\ConfigModule\Repositories\SectionRepositoryInterface;

// the same comment as in the other repos 
class SectionRepository implements SectionRepositoryInterface
{
   public function getAllSections()
   {
       $sections=Section::all();
       return $sections;
   }
   public function createSection($sectionData)
   {
       $section=Section::create($sectionData->all());
       return $section;
   }
   public function editSection($section_id)
   {
       $section=Section::where('id',$section_id)->first();
       return $section;
   }
   public function updateSection($request,$section_id)
   {
    $section=Section::where('id',$section_id)->update($request->all());
    return $section;
   }
   public function getSectionByDivision($division_id)
   {
    $sections=Division::with('Section')->find($division_id);
    return $sections;
   }
   public function changeStatus($req)
   {
    $change=Section::where('id',$req->section_id)->first();
    $change->status=$req->status;
    $change->save();
    return $change;
   }
}
