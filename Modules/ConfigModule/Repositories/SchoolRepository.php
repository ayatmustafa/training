<?php

namespace Modules\ConfigModule\Repositories;
use Modules\ConfigModule\Repositories\SchoolRepositoryInterface;
use Modules\ConfigModule\Entities\School;

class SchoolRepository implements SchoolRepositoryInterface
{
    // not right way to get translation please ask ayat for help
    private function getLocales($request) {
        $data = [];
        $lang = config('translatable.locales');
        foreach($lang as $key) {
            $data['short_name:'.$key]=$request->short_name;
            $data['long_name:'.$key]=$request->long_name;
            $data['branch_name:'.$key]=$request->branch_name;
            $data['address:'.$key]=$request->address;
        }
        return $data;
    }
    public function index() {
        return School::all();
    }
    public function show($id) {
        return School::find($id);
    }
    public function store($data) {
        // this logic should be in service or controller this function should be return $school = School::create($data); and $data should be passed to this function
        $school = School::create($data);
        return $school;
    }
    public function update($request, $school) {
        $school->update($request->all());
        return  $school;
    }
    public function destroy($school) {
        return $school->delete();
    }
}
