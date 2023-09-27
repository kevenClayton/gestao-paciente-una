<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaDadosInternacaos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internacaos', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->id('id_internacao');
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('id_estabelecimento');
            $table->unsignedBigInteger('id_setor');
            $table->unsignedBigInteger('id_leito');
            $table->unsignedBigInteger('id_status');
            $table->date('data_internacao');
            $table->timestamps();

            // $table->foreign('id_leito')->references('id_leito')->on('leitos');
            // $table->foreign('id_estabelecimento')->references('id_estabelecimento')->on('estabelecimentos');
            // $table->foreign('id_setor')->references('id_setor')->on('setors');
            // $table->foreign('id_paciente')->references('id_paciente')->on('pacientes');
        });
        DB::table('internacaos')->insert(
            array([
                'id_paciente' => 1,
                'id_estabelecimento' => 1,
                'id_setor' => 1,
                'id_leito' => 1,
                'id_status' => 2,
                'data_internacao' => '2021-08-07 12:21:05',
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
        Schema::dropIfExists('internacaos');
    }
}
