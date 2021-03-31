<?php
namespace Modules\ConfigModule\Repositories;



interface SchoolRepositoryInterface
{
    public function getSchools();
    public function CreateSchool($schooldata);
    public function editSchoolData($school_id);
    public function UpdateSchool($school_id,$request);
    public function deleteSchool($school_id);
}