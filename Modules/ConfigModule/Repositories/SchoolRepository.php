<?php


namespace Modules\ConfigModule\Repositories;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\Util\ConfigurationInterface;
use Modules\ConfigModule\Repositories\SchoolRepositoryInterface;

use Modules\ConfigModule\Entities\School;
class SchoolRepository implements SchoolRepositoryInterface
{
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
    public function show() {
        return School::with('user')->get();
    }
    public function getSchool($school) {
        return $school;
    }
    public function store($request) {
        $data=$request->all();

        $user = Auth::user()->id;
        $data = array_merge($this->getLocales($request), ['user_id'=> $user]);
        $school = School::create($data);
        return $school;
    }
    public function edit($school) {
        return $school;
    }
    public function update($request, $school) {
  
        return $school->update($request->all());
    }
    public function destroy($school) {
        return $school->delete();
    }
}
