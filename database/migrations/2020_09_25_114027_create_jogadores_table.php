<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_jogadores', function (Blueprint $table) {
            $table->increments('id_jogadores');
            $table->string('nome_jogadores', 255)->nullable();
            $table->boolean('goleiro');
            $table->integer('habilidade');
            $table->integer('excluido')->default(0);
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
        Schema::dropIfExists('jogadores');
    }
}
