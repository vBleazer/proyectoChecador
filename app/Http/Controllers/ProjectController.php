<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Visualizar usuarios') ){

            $projects = Project::where('status', 'active')->get();

            return view('admin.projects.index',compact('projects'));
        
        }else{
            return redirect()->back()->with('error','No permitido');
        }

        
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

        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Agregar usuarios') ){

            if(Project::create($request->all())){
                return redirect()->back()->with('success','ok');
            }
            
            return redirect()->back()->with('error','ok');
        
        
        }else{
            return redirect()->back()->with('error','No permitido');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Visualizar usuarios') ){

            $project = Project::find($id);

            return $project;
        
        }else{
            return redirect()->back()->with('error','No permitido');
        }

        
    }

    public function detail($id){

        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Visualizar usuarios') ){

            $project = Project::find($id);

            $users = $project->users()->get();

            return view('admin.projects.project_detail', compact('project', 'users'));

        }else{
            return redirect()->back()->with('error','No permitido');
        }

        
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
    public function update(Request $request)
    {

        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Editar usuarios') ){

            if($project = Project::find($request['id'])){

                if($project->update($request->all())){
                    return redirect()->back()->with('success','ok');
                }
            }

            return redirect()->back()->with('error','ok');
        
        }else{
            return redirect()->back()->with('error','No permitido'); 
        }

        


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Eliminar usuarios') ){

            $project = null;

            if($project = Project::find($id)){

                $project->status = "inactive";

                if($project->save()){
                    return response()->json([
                        'message' => "Proyecto eliminado",
                        'code' => 2,
                        'data' => null
                    ],200);
                }
            }

            return response()->json([
                    'message' => "No se ha podido eliminar",
                    'code' => 2,
                    'data' => null
                ], 200);
        
        }else{
            return response()->json([
                'message' => "No tienes los permisoso",
                'code' => 5,
                'data' => null
            ], 200);
        }

        
    }
}
