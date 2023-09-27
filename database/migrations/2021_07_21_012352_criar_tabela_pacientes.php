<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CriarTabelaPacientes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {

            $table->engine = 'InnoDB';

            $table->id('id_paciente');
            $table->string('nome_paciente');
            $table->string('celular_paciente');
            $table->string('cpf_paciente')->unique();
            $table->string('telefone_paciente');
            $table->string('contato_paciente_nome');
            $table->string('contato_paciente_telefone');
            $table->string('email_paciente')->unique();
            $table->string('nome_pai');
            $table->string('nome_mae');
            $table->string('naturalidade_paciente');
            $table->string('nacionalidade_paciente');
            $table->string('plano_saude');
            $table->string('data_nascimento');
            $table->timestamps();
        });

        DB::table('pacientes')->insert(
            array([
               'nome_paciente' => 'José Joaquim Pereira',
               'celular_paciente' => '(31) 99254-4367',
               'cpf_paciente' => '325.225.366-39',
               'telefone_paciente' => '(31) 3598-4556',
               'contato_paciente_nome' => 'Fábio santos',
               'contato_paciente_telefone' => '(31) 3598-4556',
               'email_paciente' => 'josejoaquim@gmail.com',
               'nome_pai' => 'Miranda Pereira Santos',
               'nome_mae' => 'Joséfina Miranda Pereira',
               'naturalidade_paciente' => 'João monlevade',
               'nacionalidade_paciente' => 'Brasileira',
               'plano_saude' => 'Unimed',
               'data_nascimento' => '13/05/1978',
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
        Schema::dropIfExists('pacientes');
    }
}
