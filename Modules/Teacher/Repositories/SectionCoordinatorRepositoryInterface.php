<?php
namespace Modules\Teacher\Repositories;

interface SectionCoordinatorRepositoryInterface
{
    public function store($req);
    public function show($id);
    public function update($id,$req);
    public function destroy($id);


}