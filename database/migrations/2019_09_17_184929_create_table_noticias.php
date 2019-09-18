<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNoticias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jornalista_id');
            $table->foreign('jornalista_id')->references('id')->on('jornalistas');
            $table->unsignedBigInteger('tipo_noticia_id');
            $table->foreign('tipo_noticia_id')->references('id')->on('tipos_noticias');
            $table->string('titulo');
            $table->string('descricao');
            $table->string('corpo_noticia');
            $table->string('link_img');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
