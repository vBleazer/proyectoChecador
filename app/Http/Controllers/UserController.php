<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Project;
use Auth;

class UserController extends Controller
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

            $section_name = "Usuarios";
            $usuarios = User::where('status','active')->get();

            return view('admin.users.index', compact('usuarios', 'section_name'));

        }else{
            return redirect()->back()->with('error','No permitido');
        }
        
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

            $request['password'] = bcrypt($request['password']);

            $usuario = new User();
            $usuario->fill($request->all());
            $usuario->role = 2;
            $usuario->assignRole($usuario->role);

            if($usuario->save()){
                return redirect()->back()->with('success','ok');
            }

            /*if(User::create($request->all())){
                
                return redirect()->back()->with('success','ok');
            }*/

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

            $usuario = User::find($id);

            return $usuario;  

        }else{
            return redirect()->back()->with('error','No permitido');
        }

        
    }

    public function detail($id = null){

        $usuario = User::find($id);

        if(empty($usuario)){
            $usuario = Auth::user();
        }
    
        $proyectos = Project::where('status','active')->get();

        $checks = $usuario->checks()->whereStatus('concluida')->get()->count();

        $numProyectosUsuario = $usuario->projects()->get()->count();

        $misProyectos = $usuario->projects()->get();

        $infoChecks = $usuario->checks()->whereStatus('concluida')->orderBy('id','desc')->limit(4)->get();

        return view('admin.users.user_detail',compact('usuario','proyectos','checks','numProyectosUsuario','infoChecks','misProyectos'));

    }

    public function inscribeToProject(Request $request, $id){

        if(Auth::user()->hasPermissionTo('Administrar usuarios') || 
           Auth::user()->hasPermissionTo('Agregar usuarios') ){

            $usuario = User::find($id);

            $ya_inscrito = sizeof($usuario->projects()->where('project_id',$request['proyecto'])->get());

            if($ya_inscrito == 0){
                
                $usuario->projects()->attach($request['proyecto']);
            
            }else{
                 return redirect()->back()->with('ya_inscrito','error'); 
            }

            

            return redirect()->back()->with('success','ok'); 
        
        }else{
            return redirect()->back()->with('error','No permitido');
        }

          
        

        //return redirect()->back()->with('error','ok');
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

            if($usuario = User::find($request['id'])){

            if(isset($request['password']) && $request['password']!=''){
                    $request['password'] = bcrypt($request['password']);
                }else{
                    $request['password'] = $usuario->password;
                }

                if($usuario->update($request->all())){
                    //return redirect(('users')->with('success','ok'));
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

            $usuario = null;
            
            if($usuario = User::find($id)){

                $usuario->status = "inactive";

                if($usuario->save()){
                    return response()->json([
                        'message' => "Registro Eliminado correctamente",
                        'code' => 2,
                        'data' => null
                    ], 200);
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
