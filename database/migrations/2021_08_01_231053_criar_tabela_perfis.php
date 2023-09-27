<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CriarTabelaPerfis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perfis', function (Blueprint $table) {
            $table->bigIncrements('id_perfil');
            $table->string('nome_perfil');
            //paciente
            $table->boolean('listar_paciente')->default(true);
            $table->boolean('criar_Paciente')->default(true);
            $table->boolean('excluir_paciente')->default(true);
            $table->boolean('editar_paciente')->default(true);
            $table->boolean('ver_paciente')->default(true);
            //internação
            $table->boolean('listar_internação')->default(true);
            $table->boolean('criar_internação')->default(true);
            $table->boolean('excluir_internação')->default(true);
            $table->boolean('editar_internação')->default(true);
            $table->boolean('ver_internação')->default(true);
            //leitos
            $table->boolean('listar_leitos')->default(true);
            $table->boolean('criar_leitos')->default(true);
            $table->boolean('excluir_leitos')->default(true);
            $table->boolean('editar_leitos')->default(true);
            $table->boolean('ver_leitos')->default(true);
            //Setores
            $table->boolean('listar_setores')->default(true);
            $table->boolean('criar_setores')->default(true);
            $table->boolean('excluir_setores')->default(true);
            $table->boolean('editar_setores')->default(true);
            $table->boolean('ver_setores')->default(true);
            //Usuários do sistema
            $table->boolean('listar_usuarios')->default(true);
            $table->boolean('criar_usuarios')->default(true);
            $table->boolean('excluir_usuarios')->default(true);
            $table->boolean('editar_usuarios')->default(true);
            $table->boolean('ver_usuarios')->default(true);
            //empresa
            $table->boolean('alterar_estabelecimento')->default(true);
            $table->boolean('criar_estabelecimento')->default(true);
            $table->boolean('excluir_estabelecimento')->default(true);
            $table->boolean('editar_estabelecimento')->default(true);
            $table->boolean('ver_estabelecimento')->default(true);

            $table->timestamps();
        });

         DB::table('perfis')->insert(
        array(
                [
                    'nome_perfil' => 'Administrador do sistema',
                    'listar_paciente' => true,
                    'criar_Paciente' => true,
                    'excluir_paciente' => true,
                    'editar_paciente' => true,
                    'ver_paciente' => true,

                    'listar_internação' => true,
                    'criar_internação' => true,
                    'excluir_internação' => true,
                    'editar_internação' => true,
                    'ver_internação' => true,

                    'listar_leitos' => true,
                    'criar_leitos' => true,
                    'excluir_leitos' => true,
                    'editar_leitos' => true,
                    'ver_leitos' => true,

                    'listar_setores' => true,
                    'criar_setores' => true,
                    'excluir_setores' => true,
                    'editar_setores' => true,
                    'ver_setores' => true,

                    'listar_usuarios' => true,
                    'criar_usuarios' => true,
                    'excluir_usuarios' => true,
                    'editar_usuarios' => true,
                    'ver_usuarios' => true,

                    'alterar_estabelecimento' => true,
                    'criar_estabelecimento' => true,
                    'excluir_estabelecimento' => true,
                    'editar_estabelecimento' => true,
                    'ver_estabelecimento' => true,
                ],
                [
                    'nome_perfil' => 'Diretor',
                    'listar_paciente' => true,
                    'criar_Paciente' => true,
                    'excluir_paciente' => true,
                    'editar_paciente' => true,
                    'ver_paciente' => true,

                    'listar_internação' => true,
                    'criar_internação' => true,
                    'excluir_internação' => true,
                    'editar_internação' => true,
                    'ver_internação' => true,

                    'listar_leitos' => true,
                    'criar_leitos' => true,
                    'excluir_leitos' => true,
                    'editar_leitos' => true,
                    'ver_leitos' => true,

                    'listar_setores' => true,
                    'criar_setores' => true,
                    'excluir_setores' => true,
                    'editar_setores' => true,
                    'ver_setores' => true,

                    'listar_usuarios' => true,
                    'criar_usuarios' => true,
                    'excluir_usuarios' => true,
                    'editar_usuarios' => true,
                    'ver_usuarios' => true,

                    'alterar_estabelecimento' => false,
                    'criar_estabelecimento' => false,
                    'excluir_estabelecimento' => false,
                    'editar_estabelecimento' => false,
                    'ver_estabelecimento' => false,
                ],
                [
                    'nome_perfil' => 'Médico',
                    'listar_paciente' => true,
                    'criar_Paciente' => true,
                    'excluir_paciente' => true,
                    'editar_paciente' => true,
                    'ver_paciente' => true,

                    'listar_internação' => true,
                    'criar_internação' => true,
                    'excluir_internação' => true,
                    'editar_internação' => true,
                    'ver_internação' => true,

                    'listar_leitos' => true,
                    'criar_leitos' => true,
                    'excluir_leitos' => true,
                    'editar_leitos' => true,
                    'ver_leitos' => true,

                    'listar_setores' => false,
                    'criar_setores' => false,
                    'excluir_setores' => false,
                    'editar_setores' => false,
                    'ver_setores' => false,

                    'listar_usuarios' => false,
                    'criar_usuarios' => false,
                    'excluir_usuarios' => false,
                    'editar_usuarios' => false,
                    'ver_usuarios' => false,

                    'alterar_estabelecimento' => false,
                    'criar_estabelecimento' => false,
                    'excluir_estabelecimento' => false,
                    'editar_estabelecimento' => false,
                    'ver_estabelecimento' => false,
                ],
                [
                    'nome_perfil' => 'Enfermeiro',
                    'listar_paciente' => true,
                    'criar_Paciente' => true,
                    'excluir_paciente' => true,
                    'editar_paciente' => true,
                    'ver_paciente' => true,

                    'listar_internação' => true,
                    'criar_internação' => true,
                    'excluir_internação' => false,
                    'editar_internação' => true,
                    'ver_internação' => true,

                    'listar_leitos' => false,
                    'criar_leitos' => false,
                    'excluir_leitos' => false,
                    'editar_leitos' => false,
                    'ver_leitos' => false,

                    'listar_setores' => false,
                    'criar_setores' => false,
                    'excluir_setores' => false,
                    'editar_setores' => false,
                    'ver_setores' => false,

                    'listar_usuarios' => false,
                    'criar_usuarios' => false,
                    'excluir_usuarios' => false,
                    'editar_usuarios' => false,
                    'ver_usuarios' => false,

                    'alterar_estabelecimento' => false,
                    'criar_estabelecimento' => false,
                    'excluir_estabelecimento' => false,
                    'editar_estabelecimento' => false,
                    'ver_estabelecimento' => false,
                ],
                [
                    'nome_perfil' => 'Administrativo',
                    'listar_paciente' => true,
                    'criar_Paciente' => true,
                    'excluir_paciente' => true,
                    'editar_paciente' => true,
                    'ver_paciente' => true,

                    'listar_internação' => true,
                    'criar_internação' => true,
                    'excluir_internação' => false,
                    'editar_internação' => true,
                    'ver_internação' => true,

                    'listar_leitos' => false,
                    'criar_leitos' => false,
                    'excluir_leitos' => false,
                    'editar_leitos' => false,
                    'ver_leitos' => false,

                    'listar_setores' => false,
                    'criar_setores' => false,
                    'excluir_setores' => false,
                    'editar_setores' => false,
                    'ver_setores' => false,

                    'listar_usuarios' => false,
                    'criar_usuarios' => false,
                    'excluir_usuarios' => false,
                    'editar_usuarios' => false,
                    'ver_usuarios' => false,

                    'alterar_estabelecimento' => false,
                    'criar_estabelecimento' => false,
                    'excluir_estabelecimento' => false,
                    'editar_estabelecimento' => false,
                    'ver_estabelecimento' => false,
                ],
            )
    );
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfis');
    }
}
