<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nivel')->default('empresa');
            $table->string('status')->default(1);
            $table->string('nome');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefone');
            $table->string('cnpj')->nullable();
            $table->bigInteger('ramo_atuacao')->nullable();
            $table->string('tamanho_empresa')->nullable();
            $table->dateTime('data_fundacao')->nullable();
            $table->string('especialidades')->nullable();
            $table->string('estado_empresa')->nullable();
            $table->string('site_empresa')->nullable();
            $table->string('nome_url')->nullable();
            $table->string('logo_empresa')->nullable();
            $table->longText('descricao')->nullable();
            $table->string('cep')->nullable();
            $table->string('rua')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->string('estado')->nullable();
            $table->string('aprovado_user_id')->nullable();
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
        Schema::dropIfExists('empresas');
    }
}
