<?php
namespace Modules\ConfigModule\Repositories;

interface DivisionRepositoryInterface
{
    public function getdivisions();
    public function DivisionByschoolID($school_id);
    public function createDivision($request);
    public function editDivisionData($division_id);
    public function UpdateDivision($request,$Division_id);
}