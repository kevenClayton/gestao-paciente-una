<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaDadosSetores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()





    {
        Schema::create('setors', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->id('id_setor');
            $table->string('nome_setor');
            $table->unsignedBigInteger('id_estabelecimento');
            $table->timestamps();

            $table->foreign('id_estabelecimento')->references('id_estabelecimento')->on('estabelecimentos');

        });

        DB::table('setors')->insert(
            array([
                'nome_setor' => 'UTI 4º andar',
                'id_estabelecimento' => 1
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
        Schema::dropIfExists('setors');
    }
}


