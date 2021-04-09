<?php 
namespace Modules\OnlineClasses\Repositories;


interface OnlineClassRepositoryInterface {
    public function index($request);
    public function show($id);
    public function store($request);
    public function update($request, $class);
    public function destroy($class);    
}
?>