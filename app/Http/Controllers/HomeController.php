<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Project;
use App\Models\Member;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        if($request->ajax()){
            $data = Project::latest()->get();
            //var_dump($data);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){ 
                    $actionBtn = '<a href="' . route('projects.show', ['project' => $row->id]) . '" class="edit btn btn-success btn-sm">Consulter</a>';
                    
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
      
       $project = new Project();
       $project->type_projet=$request->input('typeProjet');
       $project->nom_projet=$request->input('nomProjet');
       $project->description=$request->input('description');
       $project->date_debut=$request->input('dateDebut');
       $project->date_livraison=$request->input('dateLivraison');

       $project->save();
       return redirect()->route('projects.index');
        //dd('OK');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // dd(\App\Models\Project::find($id));
       
       return view('task',[
          'project'=> Project::find($id),
          'members'=> Member::all()
       ]);
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
