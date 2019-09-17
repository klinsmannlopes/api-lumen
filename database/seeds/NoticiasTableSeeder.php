<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++) {
            DB::table('noticias')->insert([
                'jornalista_id' => rand (1, 10),
                'tipo_noticia_id' => rand (1, 10),
                'titulo' => Str::random(10),
                'descricao' => Str::random(10),
                'corpo_noticia' => Str::random(100),
                'link_img' => Str::random(10),
            ]);
        }
    }
}
