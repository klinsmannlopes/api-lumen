<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TiposNoticiasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<10; $i++) {
            DB::table('tipos_noticias')->insert([
                'jornalista_id' => rand(1, 10),
                'tipo_nome' => 'tipo '.$i,
            ]);
        }
    }
}
