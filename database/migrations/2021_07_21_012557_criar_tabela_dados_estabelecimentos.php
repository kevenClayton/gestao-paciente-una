<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaDadosEstabelecimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimentos', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->id('id_estabelecimento');
            $table->string('nome_estabelecimento');
            $table->string('endereco_estabelecimento')->nullable();
            $table->string('numero_estabelecimento')->nullable();
            $table->string('bairro_estabelecimento')->nullable();
            $table->string('cidade_estabelecimento')->nullable();
            $table->string('estado_estabelecimento')->nullable();
            $table->string('pais_estabelecimento')->nullable();
            $table->string('cep_estabelecimento')->nullable();
            $table->string('cnpj_estabelecimento')->nullable();
            $table->string('maximo_usuarios')->default(5);
            $table->unsignedBigInteger('id_tipo_estabelecimento');
            $table->timestamps();

            $table->foreign('id_tipo_estabelecimento')->references('id_tipo_estabelecimento')->on('tipo_estabelecimentos');
        });

        DB::table('estabelecimentos')->insert(
            array([

                'nome_estabelecimento' => 'Hospital São Lucas',
                'endereco_estabelecimento' => 'Av. tapajós',
                'numero_estabelecimento' => '47',
                'bairro_estabelecimento' => 'Santa efigênia',
                'cidade_estabelecimento' => 'Belo Horizonte',
                'estado_estabelecimento' => 'Minas Gerais',
                'pais_estabelecimento' => 'Brasil',
                'cep_estabelecimento' => '32073-420',
                'cnpj_estabelecimento' => '62.057.235/0001-77',
                'maximo_usuarios' => '5',
                'id_tipo_estabelecimento' => 1,
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
        Schema::dropIfExists('estabelecimentos');
    }
}
