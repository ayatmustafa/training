<?php


namespace Modules\Teacher\Repositories;

use  Modules\Teacher\Traits\UploadingFile;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Entities\Agenda;
use Modules\Teacher\Entities\SectionCoordinator;
use Modules\Teacher\Repositories\AgendaRepositoryInterface;
use phpseclib\System\SSH\Agent;

class AgendaRepository implements AgendaRepositoryInterface
{
   use UploadingFile;
  
   public function fileUpload($request)
   {

      $user = Auth::user()->id;
      $file_name = $this->saveFiles($request->document, 'File/Agendas');
      $data = $request->all();
      $data['document'] = $file_name;
      $data['SectionCoordinator_id'] = $user;
      $SectionCoordinator_id = SectionCoordinator::where('user_id', $user)->first();
      $data['section_id'] = $SectionCoordinator_id->section_id;
      $agenda = Agenda::create($data);
      $agenda->academicClasses()->sync($request->academic_class_id);
      $agenda->sectionCoordinators()->attach($SectionCoordinator_id->id);

      return $agenda;
   }
   public function studentsAgenda()
   {
      $user = Auth::user()->id;
      $student = Agenda::whereHas('academicClasses.students', function ($q) use ($user) {
         $q->where('user_id', $user);
      })->get();
      return $student;
   }
   public function index()
   {
      $agenda = Agenda::where('SectionCoordinator_id', Auth::user()->id)->get();
      return $agenda;
   }
}
