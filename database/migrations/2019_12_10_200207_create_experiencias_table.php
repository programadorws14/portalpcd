<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExperienciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experiencias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->string('nome_empresa');
            $table->string('cargo');
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->string('cidade');
            $table->text('descricao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiencias');
    }
}
