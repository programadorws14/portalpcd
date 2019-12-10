<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formacoes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('usuario_id');
            $table->string('nome_instituicao');
            $table->string('formacao');
            $table->date('data_inicio');
            $table->date('data_termino');
            $table->text('descricao_formacao');
            $table->text('recomendacoes_premiacoes');
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
        Schema::dropIfExists('formacoes');
    }
}
