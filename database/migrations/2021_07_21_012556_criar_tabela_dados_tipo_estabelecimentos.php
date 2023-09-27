<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaDadosTipoEstabelecimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_estabelecimentos', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->id('id_tipo_estabelecimento');
            $table->string('nome_tipo_estab');
            $table->timestamps();
        });

        DB::table('tipo_estabelecimentos')->insert(
            array(['nome_tipo_estab' => 'Hospital'],['nome_tipo_estab' => 'Cliníca'],['nome_tipo_estab' => 'Consultório'], ['nome_tipo_estab' => 'Laboratório'], ['nome_tipo_estab' => 'Cliníca de imagem'])
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_estabelecimentos');
    }
}
