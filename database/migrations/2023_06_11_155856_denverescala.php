<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Denverescala extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DenverEscala', function (Blueprint $table) {
            $table->id();
            $table->string('etiqueta');
            $table->string('abreviatura');
    
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations. kids/database/migrations/2023_06_11_155856_denverescala.php
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('DenverEscala');
    }
}
