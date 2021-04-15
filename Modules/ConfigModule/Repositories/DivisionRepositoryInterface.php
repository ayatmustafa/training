<?php
namespace Modules\ConfigModule\Repositories;

interface DivisionRepositoryInterface
{
    public function index();
    public function divisionBySchoolId($school_id);
    public function store($request);
    public function show($division_id);
    public function Update($request,$Division_id);
}