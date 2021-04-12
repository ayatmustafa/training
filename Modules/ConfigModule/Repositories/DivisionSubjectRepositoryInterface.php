<?php 
namespace Modules\ConfigModule\Repositories;

interface DivisionSubjectRepositoryInterface {
    public function index();
    public function show($id);
    public function store($request);
    public function update($data, $id);
    public function destroy($class);
}
?>