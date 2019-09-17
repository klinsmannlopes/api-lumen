<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoNoticia extends Model
{
    protected $table = "tipos_noticias";

    protected $fillable = [
        'jornalista_id',
        'tipo_nome'
        
    ];
}
