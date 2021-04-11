<?php
namespace Modules\ConfigModule\Repositories;

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
        // enhancement remove this commented code and move all this logic to service or controller and just start to work on the passed data array
        $userId = Auth::user()->id;
        $data = array_merge($request->all(),["user_id" => $userId]);
        $divisionSubject = $this->divisionSubject->create($data);
        foreach($request->gradeIds as $gradeId){
            $divisionSubject->grades()->create(["grade_id" => $gradeId]);
        }
        return $divisionSubject;
    }
    public function update($request,$id) {
        // warning don't ever forget to remove the debugging code here the function will only return the divisionSubject
        // you could also search about updated many in laravel instead of looping

       $divisionSubject = $this->divisionSubject->find($id);
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
