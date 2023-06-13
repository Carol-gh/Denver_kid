<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ResultadosDenver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resultadosdenver', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('denverescalaId');
            $table->unsignedBigInteger('evaluacionId');
            $table->unsignedBigInteger('preguntaId');
            $table->unsignedBigInteger('areaId');
            $table->timestamps();

            $table->softDeletes();


            $table->foreign('preguntaId')->on('pregunta')->references('id')->onDelete('cascade');
            $table->foreign('evaluacionId')->on('evaluaciondenver')->references('id')->onDelete('cascade');
            $table->foreign('areaId')->on('area')->references('id')->onDelete('cascade');
            $table->foreign('denverescalaId')->on('denverescala')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.kids kids/database/migrations/2023_06_12_144841_resultados_denver.php
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resultadosdenver');
    }
}
