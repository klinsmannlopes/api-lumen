<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTipoNoticias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_noticias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('jornalista_id');
            $table->foreign('jornalista_id')->references('id')->on('jornalistas');
            $table->string('tipo_nome');
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
        Schema::dropIfExists('tipos_noticias');
    }
}
