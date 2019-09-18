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

    private $request;

    public function __construct(Request $data) {
        $this->request = $data;
        $this->middleware('jwt.auth');
        //$this->user = $data->auth->id;

    }

    public function ListaNoticiasJornalista() {

        $noticiasJornalista = Noticia::where('jornalista_id', $this->request->auth->id)->get();

        if(!$noticiasJornalista) {
            return response()->json([
                'error' => 'Jornalista nao possui noticias'
            ], 400);
        }

        return response($noticiasJornalista, 201)
        ->header('Content-Type', 'application/json');
    }

    public function listaTipoNoticiaJornalista($type_id) {

        $listaTipoNoticias = Noticia::where('jornalista_id', $this->request->auth->id)
                                    ->where('tipo_noticia_id', $type_id)->get();

        if(!$listaTipoNoticias) {
            return response()->json([
                'error' => 'noticia nao existe'
            ], 400);
        }

        return response($listaTipoNoticias, 201)
        ->header('Content-Type', 'application/json');
    }

    public function createNoticia(Request $data) {

        $this->validate($data, [
            'tipo_noticia_id' => 'required',
            'titulo' => 'required',
            'descricao' => 'required',
            'corpo_noticia' => 'required',
            'link_img' => 'required',
        ]);

        $noticias = Noticia::create([
            'jornalista_id' =>  $this->request->auth->id,
            'tipo_noticia_id' => $data->input('tipo_noticia_id'),
            'titulo' => $data->input('titulo'),
            'descricao' => $data->input('descricao'),
            'corpo_noticia' => $data->input('corpo_noticia'),
            'link_img' => $data->input('link_img'),
        ]);

        return response()->json([
            'success' => 'Noticia criada'
        ], 201);

    }

    public function updateNoticia($news_id ,Request $data) {

        $noticia =  Noticia::find($news_id);

        $noticia->tipo_noticia_id = $data->tipo_noticia_id;
        $noticia->titulo = $data->titulo;
        $noticia->descricao = $data->descricao;
        $noticia->corpo_noticia = $data->corpo_noticia;
        $noticia->link_img = $data->link_img;
        $noticia->save();

        return response()->json([
            'success' => 'Noticia editada'
        ], 200);

    }

    public function DeleteNoticia($news_id) {

        $noticia =  Noticia::find($news_id);

        $noticia->delete();

        return response()->json([
            'success' => 'Noticia deletada'
        ], 200);

    }

}
