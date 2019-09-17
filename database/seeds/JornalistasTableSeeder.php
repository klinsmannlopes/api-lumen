<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JornalistasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //factory(App\Jornalista::class, 10)->create();

        
        for($i=0; $i<20; $i++) {
            DB::table('jornalistas')->insert([
                'email' => 'test'.$i.'@gmail.com',
                'nome' => Str::random(10).'@gmail.com',
                'sobrenome' => Str::random(10),
                'password' => app('hash')->make('12345') ,
            ]);
        }
        
        
    }
}
