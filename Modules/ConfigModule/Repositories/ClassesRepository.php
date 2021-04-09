<?php


namespace Modules\ConfigModule\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\ConfigModule\Entities\Classes;
use Modules\ConfigModule\Repositories\ClassesRepositoryInterface;


class ClassesRepository implements ClassesRepositoryInterface
{
    protected $classes;
    public function __construct(Classes $classes)
    {
        $this->classes = $classes;
    }
    public function index() {
        return Classes::all();
    }
    public function show($id) {
        return $this->classes->find($id);
    }
    public function store($request) {    
        $data=  array_merge($request->all(), ['user_id' => Auth::user()->id]);
        $classes = Classes::create($data);
        return $classes;
    }
    public function update($request,$id) {
        $classes = $this->classes->find($id);
        if($classes !== null)
            return $classes->update($request->all());
        return "not exists";
    }
    public function destroy($id) {
        $classes = $this->classes->find($id);
        if($classes !== null)
            return $classes->delete();
        return "not exists";
    }
}
