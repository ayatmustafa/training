<?php
namespace Modules\OnlineClasses\Repositories;


interface OnlineClassRepositoryInterface {
    public function index($request);
    public function show($id);
    public function store($data);
    public function update($request, $class);
    public function destroy($onlineClass);
}
?>
