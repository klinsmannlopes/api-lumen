<?php

namespace App\Http\Controllers;

use Validator;
use App\Clientes;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function __construct() {
        $this->middleware('jwt.auth');
    }

    public function ListaClientes() {
        $clientes = Clientes::all();

        return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }

    public function ListaCliente($id) {

        $clientes = Clientes::find($id);

        return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }

    public function CadastarCliente(Request $data) {

        $this->validate($data, [
            'email' => 'required|email',
            'cnpj' => 'required'
        ]);

        $clientes = Clientes::create([
            'nome' => $data->input('email'),
            'cnpj'=> $data->input('cnpj')
        ]);

        return response($clientes, 201)
        ->header('Content-Type', 'application/json');

    }

    public function DeleteCliente($id) {

        $cliente = Clientes::find($id);

        $cliente->delete();

        return response($cliente, 201)
        ->header('Content-Type', 'application/json');

    }

    public function AlteraCliente(Request $data) {

        $cliente = Clientes::find($data->id);

        $cliente->nome = $data->nome;
        $cliente->cnpj = $data->cnpj;
        $cliente->save();

        return response($cliente, 201)
        ->header('Content-Type', 'application/json');

    }

}
