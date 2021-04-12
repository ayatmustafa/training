<?php 
namespace Modules\ConfigModule\Repositories;


interface SchoolRepositoryInterface {
    public function index();
    public function show($id);
    public function store($data);
    public function update($data, $school);
    public function destroy($id);    
}
?>