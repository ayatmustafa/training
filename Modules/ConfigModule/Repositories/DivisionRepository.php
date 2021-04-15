<?php


namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Division;
use Modules\ConfigModule\Entities\School;
use Modules\ConfigModule\Repositories\DivisionRepositoryInterface;

// rename all functions like in ClassesRepository
class DivisionRepository implements DivisionRepositoryInterface
{
    public function index()
    {
        // this could be return Division::all(); no need to define variable
      return  Division::all();
      
    }
    public function divisionBySchoolId($school_id)
    {
        // enhancement try to ask ayat for help here this is the DivisionRepository we should not call School Model
        // this logic should api should call the SchoolController -> SchoolRepository to get divisions via School Model relationship
       
        return Division::where('school_id',$school_id)->get();
     
    }

   
    public function store($request)
     {
         // enhancement there should be no commented code
 
        $data               =$request->all();
        $data['school_id']  = $request->school_id;
        $division           =Division::create($data);
        return $division;

    }
    public function show($division_id)
    {
        return School::find($division_id);
    }
    public function Update($request,$Division_id)
    {
        $division=Division::where('id',$Division_id)->first();
        $division->logo=$request->input('logo');
         $division->name = $request->input('name');
         $division->school_id = $request->input('school_id');
        return $division;

    }
}
