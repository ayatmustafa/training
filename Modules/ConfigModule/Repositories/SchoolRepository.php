<?php


namespace Modules\ConfigModule\Repositories;
use Modules\ConfigModule\Repositories\SchoolRepositoryInterface;

use Modules\ConfigModule\Entities\School;
class SchoolRepository implements SchoolRepositoryInterface
{
    public function getSchools()
    {
        $schools=School::all();
        return $schools;
    }

    public function CreateSchool($schooldata)
    {
            $school= School::create($schooldata->all());
            return   $school;
        // $school=new School();
        // $school->name = $request->input('name');
        // $school->address = $request->input('address');
        // $school->logo = $request->input('logo');
        // $school->user_id=$request-> auth()->user()->id;
        // $school->save();
    }

    public function editSchoolData($school_id)
    {
        $school=School::find($school_id);
        return $school;
    }
    public function UpdateSchool($school_id,$request)
    {
        $school=School::find($school_id);
        // $school->name = $request->input('name');
        // $school->address = $request->input('address');
        // $school->logo = $request->input('logo');
        // $school->user_id=$request-> auth()->user()->id;
        $school->update($request->all()); 
        return $school;   
    }
    public function deleteSchool($school_id)
    {
        $school=School::find($school_id);
        $school->delete();
        return $school;
    }
}
