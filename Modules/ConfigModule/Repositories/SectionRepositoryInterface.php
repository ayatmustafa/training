<?php
namespace Modules\ConfigModule\Repositories;

interface SectionRepositoryInterface
{
    public function getAllSections();
    public function createSection($sectionData);
    public function editSection($section_id);
    public function updateSection($request,$section_id);
    public function getSectionByDivision($division_id);
    public function changeStatus($status);



}