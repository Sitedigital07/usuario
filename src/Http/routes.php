<?php
Route::group(['middleware' => ['auths','administrador']], function (){

	Route::auth();

Route::resource('gestion/usuario', 'Digitalsite\Usuario\Http\UsuarioController');
Route::resource('gestion/crear-usuario', 'Digitalsite\Usuario\Http\UsuarioController');
Route::get('/gestion/crear-usuario', function(){
    return View::make('usuario::crear-usuario');
});


Route::resource('gestion/usuario/editar', 'Digitalsite\Usuario\Http\UsuarioController@editar');
Route::resource('gestion/usuario/actualizar', 'Digitalsite\Usuario\Http\UsuarioController@actualizar');
Route::resource('gestion/usuario/crear', 'Digitalsite\Usuario\Http\UsuarioController@crear');
Route::resource('gestion/usuario/eliminar', 'Digitalsite\Usuario\Http\UsuarioController@eliminar');

	});
