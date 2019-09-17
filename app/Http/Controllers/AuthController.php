<?php

namespace App\Http\Controllers;

use Validator;
use App\User;
use App\Jornalista;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpireException;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private $request;

    public function __construct(Request $request) {
        $this->request = $request;
        
    }

    protected function jwt(Jornalista $jornalista) {
        $payload = [
            'iss' => 'lumen-jwt',
            'sub' =>  $jornalista->id,
            'iat' =>  time(),
            'exp' =>  time() + 60*60
        ];

        return JWT::encode($payload, env('JWt_SECRET'));
    }

    public function autenticate(Jornalista $jornalista) {
        $this->validate($this->request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        
        $user = Jornalista::where('email', $this->request->input('email'))->first();

        if(!$user) {
            return response()->json([
                'error' => 'email nao existe'
            ], 400);
        }

        if(Hash::check($this->request->input('password'), $user->password)) {
            return response()->json([
                'token' => $this->jwt($user)
            ], 200);
        }

        return response()->json([
            'erro' => 'email ou senha invalidos'
        ], 400);
    }

    public function create(Request $data) {

        $this->validate($data, [
            'email' => 'required|email',
            'nome' => 'required',
            'sobrenome' => 'required',
            'password' => 'required',
        ]);

        

        $jornalista = Jornalista::create([
            'email' => $data->input('email'),
            'nome'=> $data->input('nome'),
            'sobrenome'=> $data->input('sobrenome'),
            'password'=> app('hash')->make($data->input('password'))
        ]);

        dd($jornalista);

        return response($jornalista, 201)
        ->header('Content-Type', 'application/json');

    }
}
