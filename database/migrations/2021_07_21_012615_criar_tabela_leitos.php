<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaLeitos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leitos', function (Blueprint $table) {
            $table->id('id_leito');
            $table->string('nome_leito');
            $table->unsignedBigInteger('id_setor');
            $table->timestamps();

            // $table->foreign('id_setor')->references('id_setor')->on('setors');
        });

        DB::table('leitos')->insert(
            array([

               'nome_leito' => 'Box 01',
               'id_setor' => 1
            ])
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leitos');
    }
}
