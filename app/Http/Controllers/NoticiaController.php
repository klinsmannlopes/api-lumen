<?php

namespace App\Http\Controllers;

use Validator;
use App\Clientes;
use App\Jornalista;
use App\Noticia;
use App\TipoNoticia;

use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    public function ListaNoticias() {
        $noticias = Noticia::all();

        return response($noticias, 201)
        ->header('Content-Type', 'application/json');
    }

    public function ListaCliente($id) {

        $clientes = Clientes::find($id);

        return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }

    public function createNoticia(Request $data) {

        $this->validate($data, [
            'jornalista_id' => 'required',
            'tipo_noticia_id' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'corpo_noticia' => 'required',
            'link_img' => 'required',
        ]);

        $noticias = Noticia::create([
            'jornalista_id' => $data->input('jornalista_id'),
            'tipo_noticia_id' => $data->input('tipo_noticia_id'),
            'titulo' => $data->input('titulo'),
            'descricao' => $data->input('descricao'),
            'corpo_noticia' => $data->input('corpo_noticia'),
            'link_img' => $data->input('link_img'),
            'nome' => $data->input('email'),
        ]);

        return response($noticias, 201)
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
