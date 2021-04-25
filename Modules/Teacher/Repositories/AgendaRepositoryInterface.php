<?php
namespace Modules\Teacher\Repositories;

interface AgendaRepositoryInterface
{
    public function fileUpload($request);
    public function index();
    public function show($id);
    public function update($request,$id);
    public function studentsAgenda();
}