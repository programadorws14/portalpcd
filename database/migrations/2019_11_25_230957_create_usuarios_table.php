<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->date('data_nascimento')->nullable();
            $table->string('sexo')->nullable();
            $table->string('cpf')->nullable();
            $table->longText('texto_sobre_voce')->nullable();
            $table->string('telefone_residencial')->nullable();
            $table->string('telefone_comercial')->nullable();
            $table->string('telefone_celular')->nullable();
            $table->string('foto')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('cv')->nullable();
            $table->string('laudo')->nullable();
            $table->bigInteger('status_laudo')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
