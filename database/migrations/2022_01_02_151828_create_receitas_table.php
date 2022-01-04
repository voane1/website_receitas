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
            $table->id('id_receitas')->unique();
            $table->string('nome_receita',250);
            $table->string('pais',250);
            $table->string('url_imagem_receita',250)->nullable();
            $table->string('ingredientes_receita',250);
            $table->string('preparo_receita',250);
            $table->string('url_video',250)->nullable();
            $table->integer('id_utilizador');
            $table->string('tempo_preparo',250);
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
        Schema::dropIfExists('receitas');
    }
}
