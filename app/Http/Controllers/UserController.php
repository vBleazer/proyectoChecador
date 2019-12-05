<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\User;
use Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Visualizar usuarios')){

            $users = User::where('status','active')->get();
            $section_name = "Users";

            return view('admin.users.index',compact('users','section_name'));

        }

        return redirect()->back()->with('error', 'No Permitido');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show($id)
    {
        $user = User::find($id);
        return $user; 
    }   

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function store(Request $request)
    {   
        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Agregar usuarios')){

            $request['password'] = bcrypt($request['password']);

            if (User::create($request->all())) {

               return redirect()->back()->with('success', 'ok');
            }

            return redirect()->back()->with('error', 'ok'); 
        }

        return redirect()->back()->with('error', 'No Permitido');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function update(Request $request)
    {   

        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Editar usuarios')){

            $user = null;

            if ($user = User::find($request['id'])) {


                if (isset($request['password']) && $request['password']!='') {
                    $request['password']= bcrypt($request['password']);
                }else{
                    $request['password']= $user->password;
                } 

                if ($user->update($request->all())) {

                   return redirect()->back()->with('success', 'ok');
                }


            } 

            return redirect()->back()->with('error', 'ok'); 

        }

        return redirect()->back()->with('error', 'No Permitido');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id)
    {
        if(Auth::user()->hasPermissionTo('Administrar usuarios') ||
           Auth::user()->hasPermissionTo('Eliminar usuarios')){

            $user = null;

            if ($user = User::find($user_id)) {

                $user->status = "inactive";
                $user->password = "ELIMINADO";

                if ($user->save()) {

                    return  response()->json([
                        'message' => 'Registro eliminado correctamente',
                        'code' => 2,
                        'data' => null
                    ], 200);
                }
            } 
        }

        return  response()->json([
            'message' => 'No se puso eliminar el registro',
            'code' => -2,
            'data' => null
        ], 200);
    }
}
