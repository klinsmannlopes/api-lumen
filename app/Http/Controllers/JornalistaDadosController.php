<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jornalista;

class JornalistaDadosController extends Controller
{

    private $request;

    public function __construct(Request $data) {
        $this->request = $data;
        $this->middleware('jwt.auth');
    }

    public function getJornalista() {

        $jornalistaDados = Jornalista::select('email', 'nome', 'sobrenome')
                                            ->where('id', $this->request->auth->id)->get();

        return response($jornalistaDados, 201)
        ->header('Content-Type', 'application/json');
    }
}
