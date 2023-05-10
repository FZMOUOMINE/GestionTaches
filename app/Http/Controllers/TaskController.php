<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Task;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $data = Task::select('tasks.nom_tache', 'tasks.description', DB::raw("CONCAT(members.nom, ' ', members.prenom) AS full_name"), 'tasks.date_debut', 'tasks.date_livraison')
            ->join('members', 'tasks.member_id', '=', 'members.id')
            ->where('tasks.project_id', $request->input('project_id'))
            ->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){ 
                    $actionBtn = '<a href="" class="edit btn btn-success btn-sm">Consulter</a>';
                    
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('home');
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $task = new Task();
       $task->nom_tache=$request->input('nomTache');
       $task->description=$request->input('description');
       $task->date_debut=$request->input('dateDebut');
       $task->date_livraison=$request->input('dateFin');
       $task->member_id=$request->input('membre');
       $task->project_id=$request->input('idProject');

       $task->save();
       return redirect()->route('tasks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
