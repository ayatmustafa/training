<?php

namespace Modules\Teacher\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Teacher\Http\Requests\AgendaRequest;
use Modules\Teacher\Repositories\AgendaRepositoryInterface;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    protected $AgendaRepository;
    public function __construct(AgendaRepositoryInterface $AgendaRepository)
    {
     $this->AgendaRepository = $AgendaRepository;
    }

    public function fileUpload(Request $request)
    {
         $agenda= $this->AgendaRepository->fileUpload($request);
            return response()->json([
                'status' => 'success',
                'data'   =>($agenda)
            ]);
        
    }

    public function index()
    { 
        $all_agenda= $this->AgendaRepository->index();
        return response()->json(['status'=>'success','data'=>$all_agenda]);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function studentsAgenda()
    {
        $all_agenda= $this->AgendaRepository->studentsAgenda();
        return response()->json(['status'=>'success','data'=>$all_agenda]);
    }
    public function show(Request $id)
    {
        $agenda= $this->AgendaRepository->show($id);
        return response()->json(['status'=>'success','data'=>$agenda]);
    }



    public function create()
    {
        return view('teacher::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    
    public function update(Request $request,$id)
    {
        $agenda= $this->AgendaRepository->update($request,$id);
        return response()->json(['status'=>'success','data'=>$agenda]);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
