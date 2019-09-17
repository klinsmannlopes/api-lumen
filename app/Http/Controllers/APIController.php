<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function ListaUsuario() {

        $json = [
            'usuario' => [
                'nome' => 'Leonardo',
                'idade' => 23
            ],
            'usuario2' => [
                'nome' => 'Vinicius',
                'idade' => 26
            ],
        ];


        return response($json, 201)
        ->header('Content-Type', 'application/json');

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

        $clientes = Clientes::create([
            'nome' => $data->nome,
            'cnpj'=> $data->cnpj
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
