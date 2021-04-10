<?php


namespace Modules\ConfigModule\Repositories;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Entities\DivisionSubject;
use Modules\ConfigModule\Repositories\DivisionSubjectRepositoryInterface;

class DivisionSubjectRepository implements DivisionSubjectRepositoryInterface
{

    protected $divisionSubject;
    public function __construct(DivisionSubject $divisionSubject)
    {
        $this->divisionSubject = $divisionSubject;
    }

    public function index() {
        return  $this->divisionSubject->get();
    }
    public function show($id) {
            return $this->divisionSubject->find($id);
    }

    public function store($request) {    
        // dd($request->all());
        $userId = Auth::user()->id; 
        $data = array_merge($request->all(),["user_id" => $userId]);
        $divisionSubject = $this->divisionSubject->create($data);
        // $divisionSubject = $this->divisionSubject->create($data);
        foreach($request->gradeIds as $gradeId){
            $divisionSubject->grades()->create(["grade_id" => $gradeId]);
        }
        return $divisionSubject;
    }
    public function update($request,$id) {
       return  $divisionSubject = $this->divisionSubject->find($id);
        if($divisionSubject !== null){
            $divisionSubject->update($request->all());
            foreach($request->gradeIds as $gradeId){
                $divisionSubject->grades()->update(["grade_id" => $gradeId]);
            }
            return$divisionSubject;
        }
        return "not exists";
    }
    public function destroy($id) {
        $divisionSubject = $this->divisionSubject->find($id);
        if($divisionSubject !== null) {
            return $divisionSubject->delete();
        }
        return "not exists";
    }
}
