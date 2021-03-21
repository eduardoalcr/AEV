<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnunciadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enunciados', function (Blueprint $table) {
            $table->id('enu_codigo');
            $table->string('enu_nome',1500);
            $table->string('enu_correcao',300);
            $table->unsignedBigInteger('enu_mat_codigo')->unsigned();
            $table->foreign('enu_mat_codigo')->references('mat_codigo')->on('materias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enunciados');
    }
}
