<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVagasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id');
            $table->dateTime('data_abertura');
            $table->dateTime('data_vencimento');
            $table->string('titulo');
            $table->bigInteger('status');
            $table->longText('descricao');
            $table->bigInteger('estado_id');
            $table->bigInteger('municipio_id');
            $table->string('cep');
            $table->string('endereco');
            $table->string('beneficios')->nullable();
            $table->bigInteger('salario')->nullable();
            $table->bigInteger('qtd_vagas');
            $table->string('horario');
            $table->bigInteger('profissao_id');
            $table->string('info_adicionais')->nullable();
            $table->bigInteger('aprovacao_user_id')->nullable();
            $table->longText('info_aprovacao_user_id')->nullable();
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
        Schema::dropIfExists('vagas');
    }
}
