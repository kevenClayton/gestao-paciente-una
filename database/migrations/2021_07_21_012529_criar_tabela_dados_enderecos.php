<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaDadosEnderecos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->id('id_endereco');
            $table->string('endereco');
            $table->bigInteger('numero');
            $table->string('cep');
            $table->string('cidade');
            $table->string('pais');
            $table->string('bairro');
            $table->string('complemento')->nullable();
            $table->string('tipo_endereco')->nullable();
            $table->unsignedBigInteger('id_paciente');
            $table->timestamps();

            $table->foreign('id_paciente')->references('id_paciente')->on('pacientes');

        });

        DB::table('enderecos')->insert(
            array([
                'endereco'=> 'Av. Brasil',
                'numero'=> '2532',
                'cep'=> '32073-420',
                'cidade'=> 'Belo Horizonte',
                'pais'=> 'Brasil',
                'bairro'=> 'Savassi',
                'complemento' => '',
                'tipo_endereco' => 'Prédio comercial',
                'id_paciente'=> 1,
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
        Schema::dropIfExists('enderecos');
    }
}
