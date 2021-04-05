<?php

namespace Modules\Config\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\Config\Entities\School;

class SchoolRepository implements SchoolRepositoryInterface
{
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
        $user = Auth::user()->id;
        $data = array_merge($request->all(), ['user_id'=> $user]);
        $school = School::create($data);
        return $school;
    }
    public function edit($school) {
        return $school;
    }
    public function update($request, $school) {
        
        return $school->first()->update($request->all());
    }
    public function destroy($school) {
        return $school->delete();
    }

}
