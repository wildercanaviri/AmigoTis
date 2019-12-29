<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
/* /
Route::get('/', function () {
    return view('welcome');
});
*/
Route::get('/', "PaginasController@inicio");

Route::get('/inicio', "PaginasController@inicio");

/*Route::get('/carta', "PaginasController@carta");*/

Route::resource('/carta', "CartasController");
Route::get('/boletin', "PaginasController@boletin");


//Route::resource('/roles',"RolesController");
//USUARIOS
/*Route::resource('/usuarios',"UsuariosController");


Route::get('delete/{id}', 'UsuariosController@destroy')->name('usuario.delete');*/


//Route::get('/usuarios/buscador',"UsuariosController@buscador");
//LOGIN
Route::get('/login',"loginController@index");

Route::post('/loginValidar',[
    'as'=>'loginValidar',
    'uses'=>"loginController@store"]);

//Route::get('/loginCerra',"loginController@cerrarSesion");
//Route::get('/loginCerra',[
 //   'as'=>'loginCerra',
 //   'uses'=>"loginController@cerrarSesion"]);



 



//ADMINISTRADOR
Route::resource('/administrador', "AdminController");

Route::group(['middleware' => 'auth'], function(){
	Route::get('logout', ['as' =>'logout', 'uses' => 'loginController@cerrarSesion']);

  ///USUARIOS
//Route::resource('/usuarios',"UsersController");
//ver lista de usuarios del sistema
Route::get('/usuarios',"UsersController@index")->middleware('permissionshinobi:ver_usuario');
Route::post('/usuarios',"UsersController@store")->middleware('permissionshinobi:ver_usuario');
//crear Cuenta de Usuario
Route::get('/usuarios/create',"UsersController@create")->middleware('permissionshinobi:ver_usuario');
//ver Usuario singular
Route::get('/usuarios/{id}',"UsersController@show")->middleware('permissionshinobi:ver_usuario');
//editar Cueta de Usuario
Route::get('/usuarios/{id}/edit',"UsersController@edit")->middleware('permissionshinobi:editar_usuario');
//eliminar cuenta de Usuario
Route::get('usuarios/delete/{id}', 'UsersController@destroy')->name('usuarios.delete')->middleware('permissionshinobi:eliminar_usuario');
Route::resource('/usuarios',"UsersController");

//----------ROLES
//Asignar Roles
Route::get('/roles/asignacion',"RolesController@asignar");
Route::post('/roles/asignacion/unir',"RolesController@role_user")->middleware('permissionshinobi:asignar_rol');
//ver Lista de Roles
Route::get('/roles',"RolesController@index")->middleware('permissionshinobi:ver_rol');
Route::post('/roles',"RolesController@store")->middleware('permissionshinobi:ver_rol');
//crear Rol
Route::get('/roles/create',"RolesController@create")->middleware('permissionshinobi:crear_rol');
//ver Rol singular
Route::get('/roles/{id}',"RolesController@show")->middleware('permissionshinobi:ver_rol');
//editar Rol
Route::get('/roles/{id}/edit',"RolesController@edit")->middleware('permissionshinobi:editar_rol');


//eliminar Rol
Route::get('roles/delete/{id}', 'RolesController@destroy')->name('roles.delete')->middleware('permissionshinobi:eliminar_rol');
Route::resource('/roles',"RolesController");


//---------PERMISOS
//Asignar permiso a rol
  Route::get('/permisos/asignacion',"PermisosController@asignar");
  Route::post('/permisos/asignacion/ui',"PermisosController@asignado")->middleware('permissionshinobi:asignar_permiso');
//ver lista de permisos
  Route::get('/permisos',"PermisosController@index")->middleware('permissionshinobi:ver_lista_permisos');
  Route::resource('/permisos',"PermisosController"); 


   


  Route::get('/correo', "CorreoController@index");
   Route::get('/configuracion',"CuentaUsuarioController@configuracion");

    Route::post('cambiar_leido',"CartasController@cambiar_a_leido");
   
   Route::post('/configuracion/eliminar',"CuentaUsuarioController@eliminar");

   Route::post('/configuracion/usuario',"CuentaUsuarioController@actualizar");

   Route::get('/informacionPersonal',"CuentaUsuarioController@informacionPersonal");
   
   Route::post('/informacionPersonal/editar',"CuentaUsuarioController@update");
   Route::get('/notificaciones',"CuentaUsuarioController@notificaciones");

   Route::post('correo/generarNuevaInformacion', "CorreoController@generarNuevaInformacion");


   Route::post('/infoNueva', "CorreoController@InformacionObtenida");
      
   Route::resource('/crearBoletin',"BoletinesController");

   Route::get('/informacion/{id}',"InformacionController@create")->name('informacion.create');
   Route::post('/informacion/create',"InformacionController@store");
   

});
//Route::resource('/correo', "CorreoController");
  

