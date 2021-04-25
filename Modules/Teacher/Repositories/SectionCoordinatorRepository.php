<?php


namespace Modules\Teacher\Repositories;

use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Modules\Teacher\Entities\SectionCoordinator;
use Modules\Teacher\Repositories\SectionCoordinatorRepositoryInterface;

class SectionCoordinatorRepository implements SectionCoordinatorRepositoryInterface
{


   protected $section_coordinator;
   public function __construct(SectionCoordinator $section_coordinator)
   {
       $this->section_coordinator= $section_coordinator;
   }


 public function store($req)
 {
    $user = Auth::user()->id;
    $section_coordinator=$this->section_coordinator->create(array_merge($req->all(), ['user_id' => $user]));
    return  $section_coordinator;
 }
 public function show($id)
 {
   return $this->section_coordinator->find($id);
 }
 public function update($id,$req)
 {
   $section_coordinator=  $this->section_coordinator->find($id);
   if($section_coordinator !== null){
   $section_coordinator->update($req->all());
      return $section_coordinator;
   
   }
 }
 public function destroy($id)
 {
    $isdestroy=$this->section_coordinator->find($id);
    if($isdestroy!==null){
       return $isdestroy->delete();
    }
 }
}
