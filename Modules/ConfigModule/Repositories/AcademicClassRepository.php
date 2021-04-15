<?php


namespace Modules\ConfigModule\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Entities\AcademicClass;
use Modules\ConfigModule\Repositories\AcademicClassRepositoryInterface;

// enhancement class name should be Singular like ClassRepository and also the interface and models
class AcademicClassRepository implements AcademicClassRepositoryInterface
{
    protected $class;
    public function __construct(AcademicClass $class)
    {
        $this->academicClass = $class;
    }
    public function index() {
        return $this->academicClass->all();
    }
    public function show($id) {
        return $this->class-> find($id);
    }
    public function store($data) {
        // enhancement this request data handling should be in service class or at least in the controller the repo function only is to interact with db
        //you should pass this $data ready from the right place to here
        //this var should be $class
        $class = AcademicClass::create($data);
        return $class;
    }
    public function update($request,$id) {

        //enhancement pass data from controller or service
        /* this could be
         * $isUpdated = Class::whereId($id)->update($data);
         * return $isUpdated;
         * then you can check in service or controller if it's updated or not exist
         * the repo only job is to interact with db not to handle any logic
         */

        $isUpdated = AcademicClass::whereId($id)->first();
        if($isUpdated !== null){
            $isUpdated->update($request->all());
        return $isUpdated;
        }
    }
    public function destroy($id) {
        $classes = $this->classes->find($id);
        if($classes !== null)
            return $classes->delete();
    }
}
