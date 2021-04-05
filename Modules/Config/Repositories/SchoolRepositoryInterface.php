<?php 
namespace Modules\Config\Repositories;


interface SchoolRepositoryInterface {
    public function index();
    public function show();
    public function store($request);
    public function getSchool($school);
    public function edit($school);
    public function update($request, $school);
    public function destroy($school);    
}
?>