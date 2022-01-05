<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id()->unique();

            $table->timestamps();
        });

        Schema::table('likes', function (Blueprint $table) {
            $table->unsignedBigInteger('id_receita');
            $table->foreign('id_receita')->references('id')->on('receitas')->onUpdate('cascade')->onDelete('cascade');
            $table->unsignedBigInteger('id_utilizador');
            $table->foreign('id_utilizador')->references('id')->on('utilizadors')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
