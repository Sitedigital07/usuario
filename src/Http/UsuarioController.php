<?php

namespace Digitalsite\Usuario\Http;
use Digitalsite\Usuario\Usuario;
use Illuminate\Support\Facades\Auth;
use DB;
use File;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use GuzzleHttp\Client;


class UsuarioController extends Controller
{
	
public function __construct()
    {
        $this->middleware('auth');
    }


public function index() {

    $users = Usuario::all();
	return view('usuario::usuarios')->with('users',$users);
}



public function crear() {

	
	$price = DB::table('users')->max('id');
	$suma = $price + 1;
	$path = public_path() . '/fichaimg/clientes/'.$suma;
	File::makeDirectory($path, 0777, true);
	$password = Input::get('password');
	$remember = Input::get('_token');
	$user = new Usuario;
	$user->name = Input::get('name');
	$user->last_name = Input::get('last_name');
	$user->email = Input::get('email');
	$user->address = Input::get('address');
	$user->phone = Input::get('phone');;
	$user->rol_id = Input::get('level');
	$user->remember_token = Input::get('_token');
	$user->password = Hash::make($password);
	$user->remember_token = Hash::make($remember);
	
	$user->save();

	return Redirect('gestion/usuario')->with('status', 'ok_create');}  



public function eliminar($id) {

	$user = Usuario::find($id);
	$user->delete();

	return Redirect('gestion/usuario')->with('status', 'ok_delete');}


public function editar($id){

		$usuario = Usuario::find($id);
	    return view('usuario::editar-usuario')->with('usuario', $usuario);
	}

		public function actualizar($id){

		$input = Input::all();
		$user = Usuario::find($id);
		$user->name = Input::get('name');
		$user->last_name = Input::get('last_name');
		$user->email = Input::get('email');
		$user->address = Input::get('address');
		$user->phone = Input::get('phone');
		$user->rol_id = Input::get('level');

		
		
		$user->save();
		return Redirect('gestion/usuario')->with('status', 'ok_update');
	}


	public function meta()
{

	$seed = date('c');

if (function_exists('random_bytes')) {
    $nonce = bin2hex(random_bytes(16));
} elseif (function_exists('openssl_random_pseudo_bytes')) {
    $nonce = bin2hex(openssl_random_pseudo_bytes(16));
} else {
    $nonce = mt_rand();
}

$secretKey = '9dZA2Nho';

$nonceBase64 = base64_encode($nonce);

$tranKey = base64_encode(sha1($nonce . $seed . $secretKey, true));
    //The JSON data.
$dataArray = array(
    'auth' => [
    'login' => '5572937dba374a3078f9e4d8987feb0a',
    'seed' => $seed,
    'nonce' => $nonceBase64,
    'tranKey' => $tranKey,
    ],

    'payment' => [
    'reference' => '5976030f5575d',
    'description' => 'Pago basico de prueba',
    'amount' => [
    'currency' => 'COP',
    'total' => '10000',
      ],     
    ],

    'expiration' => date('c', strtotime('+2 days')),
    'returnUrl' => 'https://dev.placetopay.com/',
    'ipAddress' => '127.0.0.1',
    'userAgent' => 'PlacetoPay Sandbox',
);
    $client = new Client();
    $res = $client->request('GET', 'https://test.placetopay.com/redirection', [
        json_encode($dataArray)
    ]);



    $result= $res->getBody()->getContents();
   return Redirect('https://test.placetopay.com/redirection');
}
}

