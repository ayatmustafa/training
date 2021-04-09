<?php 
namespace Modules\ConfigModule\Repositories;


interface ClassesRepositoryInterface {
    public function index();
    public function show($id);
    public function store($request);
    public function update($request, $class);
    public function destroy($class);    
}
?>