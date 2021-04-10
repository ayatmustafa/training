<?php


namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\School;
use Modules\ConfigModule\Repositories\DivisionRepositoryInterface;

class DivisionRepository implements DivisionRepositoryInterface
{
    public function getdivisions()
    {
        $division = Division::all();
        return $division;
    }


    public function DivisionByschoolID($school_id)
    {
        $school_id = School::find($school_id);
        $divisions = $school_id->division;
        return $divisions;
    }
    public function createDivision($request)
     { 
    //     $division=Division::create($DivisionData->all());
    //     return $division;
        $data               =$request->all();
        $data['school_id']  = $request->school_id;
        $division           =Division::create($data);
        // $divition->attachrole("student")
        return $division;

    }
    public function editDivisionData($division_id)
    {
        $division=School::find($division_id);
        return $division;
    }
    public function UpdateDivision($request,$Division_id)
    {
        $division=Division::where('id',$Division_id)->first();
        $division->logo=$request->input('logo');
         $division->name = $request->input('name');
         $division->school_id = $request->input('school_id');
        return $division;

    }
}
