<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id()->unique()->autoIncrement();
            $table->string('texto_comments',250)->nullable();
            $table->timestamps();
        });

        Schema::table('comentarios', function (Blueprint $table) {
            $table->unsignedBigInteger('id_utilizador');
            $table->foreign('id_utilizador')->references('id')->on('utilizadors')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_receita');
            $table->foreign('id_receita')->references('id')->on('receitas')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
