<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksSociaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links_sociais', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('link')->nullable();
            $table->bigInteger('empresa_id')->nullable();
            $table->foreign('empresa_id')->references('id')->on('empresas');
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
        Schema::dropIfExists('links_sociais');
    }
}
