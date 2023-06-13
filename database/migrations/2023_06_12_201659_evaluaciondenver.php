<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
class Evaluaciondenver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluaciondenver', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->unsignedSmallInteger('edadMeses');
            $table->unsignedBigInteger('personalId');
            $table->unsignedBigInteger('infanteId');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('personalId')->on('personal')->references('id')->onDelete('cascade');
            $table->foreign('infanteId')->on('infante')->references('id')->onDelete('cascade');
        });
    }
    /**
     * Reverse the kids kids/database/migrations/2023_06_12_201659_evaluaciondenver.php
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluaciondenver');
    }
}

