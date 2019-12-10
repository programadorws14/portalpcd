<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoluntariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voluntarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('usuario_id');
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->string('nome_instituicao_voluntario');
            $table->string('cargo_voluntario');
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->text('recomendacoes_premiacoes');
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
        Schema::dropIfExists('voluntarios');
    }
}
