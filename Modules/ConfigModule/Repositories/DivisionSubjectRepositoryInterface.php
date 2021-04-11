<?php 
namespace Modules\ConfigModule\Repositories;

interface DivisionSubjectRepositoryInterface {
    public function index();
    public function show($id);
    public function store($request);
    public function update($request, $divisionSubject);
    public function destroy($class);
}
?>