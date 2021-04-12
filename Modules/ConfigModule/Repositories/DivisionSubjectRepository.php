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
        // enhancement remove this commented code and move all this logic to service or controller and just start to work on the passed data array
        $divisionSubject = $this->divisionSubject->create($data);
            $divisionSubject->gradeSubjects()->createMany(
                $data["gradeIds"]
            );
        return $divisionSubject;
    }
    public function update($data,$id) {
        // warning don't ever forget to remove the debugging code here the function will only return the divisionSubject
        // you could also search about updated many in laravel instead of looping
        //  dd($data->all());

       $divisionSubject = $this->divisionSubject->find($id);
        if($divisionSubject !== null){
            $divisionSubject->update($data->all());
                $divisionSubject->gradeSubjects()->upsert($data['gradeIds']);
        
            return $divisionSubject;
        }
        return "not exists";
    }
    public function destroy($id) {
        $divisionSubject = $this->divisionSubject->find($id);
        if($divisionSubject !== null)
            return $divisionSubject->delete();
    }
}
