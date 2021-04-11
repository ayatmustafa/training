<?php


namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\School;
use Modules\ConfigModule\Repositories\DivisionRepositoryInterface;

// rename all functions like in ClassesRepository
class DivisionRepository implements DivisionRepositoryInterface
{
    public function getdivisions()
    {
        // this could be return Division::all(); no need to define variable
        $division = Division::all();
        return $division;
    }


    public function DivisionByschoolID($school_id)
    {
        // enhancement try to ask ayat for help here this is the DivisionRepository we should not call School Model
        // this logic should api should call the SchoolController -> SchoolRepository to get divisions via School Model relationship
        $school_id = School::find($school_id);
        $divisions = $school_id->division;
        return $divisions;
    }
    public function createDivision($request)
     {
         // enhancement there should be no commented code
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
