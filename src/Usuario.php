<?php

namespace Digitalsite\Usuario;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

	protected $table = 'users';
		public $timestamps = true;


	protected $fillable = [
	'name', 'last_name', 'email', 'address', 'phone', 'rol_id', 'password', 'remember_token',
	];

	public function events(){

	return $this->hasMany('\Digitalsite\Calendario\Calendar');
	}

	public function fichas(){

	return $this->hasMany('\Digitalsite\Pagina\Fichaje');
	}


	protected $hidden = array('password', 'remember_token');

}

