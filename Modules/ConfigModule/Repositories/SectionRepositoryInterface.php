<?php
namespace Modules\ConfigModule\Repositories;

interface SectionRepositoryInterface
{
    public function index();
    public function store($sectionData);
    public function show($section_id);
    public function update($request,$section_id);
    public function getSectionByDivision($division_id);
    public function changeStatus($status);



}