<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaDadosClinicos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dados_clinicos', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->id('id_dados_clinicos');
            $table->string('leucocitos');
            $table->string('pcr');
            $table->string('temperatura');
            $table->string('balanco_hidrico');
            $table->string('diurese');
            $table->longText('observacao');
            $table->string('dieta');
            $table->unsignedBigInteger('id_internacao');
            $table->string('medicamentos_em_uso');
            $table->string('plano_terapeutico');
            $table->timestamps();

            // $table->foreign('id_internacao')->references('id_internacao')->on('internacaos');
        });

        DB::table('dados_clinicos')->insert(
            array([
                'leucocitos' => '12.20' ,
                'pcr' => '25.12' ,
                'temperatura' => '35.80 Cº' ,
                'balanco_hidrico' => '32.35' ,
                'diurese' => '112.35' ,
                'observacao' => 'Previsão de alta hoje(08/08/2021) às 13h' ,
                'dieta' => 'Pastosa' ,
                'id_internacao' => 1 ,
                'medicamentos_em_uso' => 'Zerotatina' ,
                'plano_terapeutico' => 'Administração de dipirona' ,
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
        Schema::dropIfExists('dados_clinicos');
    }
}
