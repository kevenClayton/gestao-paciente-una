<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CriarTabelaStatusInternacao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status_internacao', function (Blueprint $table) {
            $table->id('id_status');
            $table->string('nome_status');
            $table->timestamps();
        });

        DB::table('status_internacao')->insert(
            array(['nome_status' => 'Alta da UTI'], ['nome_status' => 'Internado'], ['nome_status' => 'Alta para casa'], ['nome_status' => 'Óbito'] )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status_internacao');
    }
}
