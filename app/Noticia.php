<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    protected $table = "noticias";

    protected $fillable = [
        'nome', 
        'jornalista_id', 
        'tipo_noticia_id',
        'titulo',
        'descricao',
        'corpo_noticia',
        'link_img',
    ];
}
