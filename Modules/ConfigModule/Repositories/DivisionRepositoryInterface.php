<?php
namespace Modules\ConfigModule\Repositories;

interface DivisionRepositoryInterface
{
    public function index();
    public function divisionBySchoolId($school_id);
    public function create($request);
    public function edit($division_id);
    public function Update($request,$Division_id);
}