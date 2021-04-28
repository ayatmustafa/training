<?php

namespace Modules\ConfigModule\Repositories;

use Modules\ConfigModule\Entities\Configuration;
use Modules\ConfigModule\Repositories\SchoolRepositoryInterface;
use Modules\ConfigModule\Entities\School;

class SchoolRepository implements SchoolRepositoryInterface
{
    private function getLocales($request) {
        $data = [];
        $lang = Configuration::where('key', 'locales')->first();
        foreach($lang->value as $key) {
            $data['short_name:'.$key]  = $request['short_name'];
            $data['long_name:'.$key]   = $request['long_name'];
            $data['branch_name:'.$key] = $request['branch_name'];
            $data['address:'.$key]     = $request['address'];
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
        $data = array_merge($data, $this->getLocales($data));
        $school = School::create($data);
        return $school;
    }
    public function update($data, $id) {
        $isUpdated = School::find($id);
        if($isUpdated !== null)
            $isUpdated->update($data->all());
        return $isUpdated;
    }
    public function destroy($id) {
        $isDeleted = School::where('id', $id)->first();
        if($isDeleted !== null)
          return $isDeleted->delete();
    }
}
