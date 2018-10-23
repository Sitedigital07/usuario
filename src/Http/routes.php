<?php
Route::group(['middleware' => ['auths','administrador']], function (){
Auth::routes();
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


Route::resource('mata/meo', 'Digitalsite\Usuario\Http\UsuarioController@meta');
	


 Route::group(['middleware' => ['web']], function (){


});



Route::post('/login', function(App\Http\Requests\AccesoRequest $Request) 
{


    $credentials = Input::only('email', 'password'); 

    if ( ! Auth::attempt($credentials))
    {
        return Redirect::back()->withMessage('Invalid credentials');

    }

    if (Auth::user()->rol_id == 1) 
    {
        return Redirect::to('/gestion/paginas');
    }
     elseif (Auth::user()->rol_id == 2 and count($cart) == 0) {
    
     
         return Redirect::to('/');
     
    }

    elseif (Auth::user()->rol_id == 2 and count($cart) >= 1) {
    
     
         return Redirect::to('/cart/detail');
     
    }

    elseif (Auth::user()->rol_id == 3) {
    	return Redirect::to('/gestion/avanza');
    }

    return Redirect::to('/');
});
 


 