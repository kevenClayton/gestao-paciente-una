<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('cpf')->unique();
            $table->unsignedBigInteger('id_perfil');
            $table->unsignedBigInteger('id_status');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            // $table->foreign('id_perfil')->references('id_perfil')->on('perfis');

        });

        DB::table('users')->insert(
            array(
                [
                'nome' => 'Fernando Xavier',
                'telefone' => '(31) 99254-4367',
                'celular' => '(31) 99254-4367',
                'cpf' => '018.625.876-39',
                'id_perfil' => 1,
                'id_status' => 1,
                'email' => 'fernando@gmail.com',
                'password' => '$2y$10$Dfbgohf8WCW1dxV9rppZOOi07kOzZmSsyDL/wbeHYzqGryJfz1Qba',
                ],
                [
                'nome' => 'Usuário teste',
                'telefone' => '(31) 99254-4367',
                'celular' => '(31) 99254-4367',
                'cpf' => '023.625.876-39',
                'id_perfil' => 1,
                'id_status' => 1,
                'email' => 'admin@admin.com',
                'password' => '$2y$10$Dfbgohf8WCW1dxV9rppZOOi07kOzZmSsyDL/wbeHYzqGryJfz1Qba',
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
        Schema::dropIfExists('users');
    }
}
