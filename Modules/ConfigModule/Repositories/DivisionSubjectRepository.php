<?php
namespace Modules\ConfigModule\Repositories;

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
    public function store($data) {
        $isExisted = $this->divisionSubject->where('subject_id', $data['subject_id'])
        ->where('division_id', $data['division_id'])
        ->count();
        if($isExisted > 0)
            return;
        // enhancement remove this commented code and move all this logic to service or controller and just start to work on the passed data array
        $storeDivisionSubject = $this->divisionSubject->create($data);
            $storeDivisionSubject->grades()->attach(
                $data["gradeIds"]
            );
        return $storeDivisionSubject;
    }
    public function update($data,$id) {
        // warning don't ever forget to remove the debugging code here the function will only return the divisionSubject
        // you could also search about updated many in laravel instead of looping
       $isUpdated = $this->divisionSubject->find($id);
        if($isUpdated !== null){
            $isUpdated->update($data->all());
                $isUpdated->grades()->sync($data['gradeIds']);
            return $isUpdated;
        }
    }
    public function destroy($id) {
        $isDeleted = $this->divisionSubject->find($id);
        if($isDeleted !== null)
            return $isDeleted->delete();
    }
}
