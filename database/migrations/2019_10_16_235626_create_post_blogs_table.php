<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('capa')->nullable();
            $table->string('titulo');
            $table->longText('conteudo');
            $table->dateTime('data_publicacao');
            $table->bigInteger('categoria_id');
            $table->foreign('categoria_id')->references('id')->on('blog_categorias');
            $table->bigInteger('autor_id');
            $table->foreign('autor_id')->references('id')->on('admin');
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
        Schema::dropIfExists('posts');
    }
}
