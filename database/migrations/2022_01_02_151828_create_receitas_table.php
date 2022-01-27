<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('receitas', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('nome_receita',250);
            $table->string('pais',250);
            $table->string('url_imagem_receita',250)->nullable();
            $table->string('ingredientes_receita',250);
            $table->string('preparo_receita',250);
            $table->string('url_video',250)->nullable();
            $table->string('tempo_preparo',250);
            $table->timestamps();
        });

        Schema::table('receitas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilizador');
            $table->foreign('id_utilizador')->references('id')->on('utilizadors')->onUpdate('cascade')->onDelete('cascade');;
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('receitas');
    }
}
