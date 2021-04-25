<?php


namespace Modules\Teacher\Repositories;

use  Modules\Teacher\Traits\UploadingFile;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Entities\Agenda;
use Modules\Teacher\Entities\SectionCoordinator;
use Modules\Teacher\Repositories\AgendaRepositoryInterface;
use Illuminate\Support\Facades\File;

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
   public function show($id)
   {
      return Agenda::findOrFail($id);
   }
   public function update($request,$id)
   {


      $user = Auth::user()->id;
      // dd($request->id);
      $agenda = Agenda::find($id);
      
      File::delete(public_path('File/Agendas' . $agenda->document));
      $file_name = $this->saveFiles($request->document, 'File/Agendas');
      $data = $request->all();
      $data['document'] = $file_name;
      $data['SectionCoordinator_id'] = $user;
      $SectionCoordinator_id = SectionCoordinator::where('user_id', $user)->first();
      $data['section_id'] = $SectionCoordinator_id->section_id;
      Agenda::whereId($id)->first()->update($data);
      $agenda->academicClasses()->sync($request->academic_class_id);
      $agenda->sectionCoordinators()->attach($SectionCoordinator_id->id);
      return $agenda;
   }
}
