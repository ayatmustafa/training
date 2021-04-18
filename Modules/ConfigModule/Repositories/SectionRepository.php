<?php


namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Configuration;
use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\Section;
use Modules\ConfigModule\Repositories\SectionRepositoryInterface;
use Symfony\Component\Console\Input\Input;

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
        $configs=Configuration::where('key','locales')->first();
        $section = Section::where('id', $section_id)->first();
           foreach( $configs->value as $value){
             $data['name:'.$value]=$request->name;
           }
           $section->update(array_merge($request->all(),$data));

            return $section;
    }
    public function getSectionByDivision($division_id)
    {
        return Section::where('division_id',$division_id)->get();
    }
    public function changeStatus($req)
    {
        $change = Section::where('id', $req->section_id)->first();
        $change->status = $req->status;
        $change->save();
        return $change;
    }
}
