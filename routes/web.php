<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', function () {
    return view('auth.login');
});


Auth::routes();

Route::get('/pruebaRelacion', function(){

	$usuario = App\User::findOrFail(2);

	return $usuario->checks()->whereStatus('concluida')->orderBy('fecha','asc')->get();
});

Route::get('/pruebaUserProject', function(){

	$usuario = App\User::findOrFail(2);

	$existe = $usuario->projects()->where('project_id',1)->get();

	$existe = sizeof($existe);

	if($existe == 0){
		return $usuario->projects()->where('project_id',1)->get();
	}else{
		echo "EL USUARIO YA ESTA INSCRITO";
	}

	//return $tam;

	/*if(isset($existe)){
		return "existe";
	}else{
		return "no existe";
	}*/

	//return $existe;

	/*if(empty($usuario->projects()->where('project_id',1)->get())){
		return $usuario->projects()->where('project_id',1)->get();
	}else{
		return "Este usuario ya esta inscrito en el proyecto";
	}*/

	//return $usuario->projects()->where('project_id',1)->get();

	//$proyecto = App\Project::findOrFail(2);

	//return $usuario->projects()->get();

});

/*
Route::get('/checador', function(){
	return view('checador.index');
});*/

Route::get('/configuracion', function(){
	return view('admin.config.index');
});

Route::get('/', function(){
	return view('checador.reloj');
});


//Route::get('/home', 'HomeController@index')->name('home');

//ruta de usuario comunt
Route::get('/home', 'UserController@detail')->name('home');

//rutas de modulo de usuarios
Route::get('/usuarios', 'UserController@index')->name('usuarios');
Route::get('/usuario/{id}', 'UserController@show')->name('usuario');
Route::get('/usuario_detail/{id}', 'UserController@detail')->name('usuario_detail');
Route::post('/usuario', 'UserController@store')->name('usuario');
Route::put('/usuario', 'UserController@update')->name('usuario');
Route::delete('/usuario/{id}', 'UserController@destroy');
Route::post('/inscribeToProject/{id}', 'UserController@inscribeToProject')->name('inscribeToProject');

//rutas del modulo de proyectos
Route::get('/proyectos', 'ProjectController@index')->name('proyectos');
Route::get('/proyecto/{id}', 'ProjectController@show')->name('proyecto');
Route::get('/proyecto_detail/{id}', 'ProjectController@detail')->name('proyecto_detail');
Route::post('/proyecto', 'ProjectController@store')->name('proyecto');
Route::put('/proyecto', 'ProjectController@update')->name('proyecto');
Route::delete('/proyecto/{id}', 'ProjectController@destroy');

//rutas de checks
Route::post('/checador', 'CheckController@index')->name('/checador');
//Route::get('/check/{id}', 'CheckController@checar')->name('check');

//rutas de configuracion
Route::post('/config_segundos', 'ConfigurationController@update')->name('config_segundos');
Route::get('/get_segundos', 'ConfigurationController@getSegundos')->name('get_segundos');