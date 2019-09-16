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

}
