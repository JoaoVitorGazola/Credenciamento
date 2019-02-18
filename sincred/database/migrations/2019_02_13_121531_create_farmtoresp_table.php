<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmtorespTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmtoresp', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('responsaveis_id');
            $table->unsignedInteger('farmacias_id');
            $table->foreign('responsaveis_id')->references('id')->on('responsaveis')->onUpdate('restrict')->onDelete('cascade');
            $table->foreign('farmacias_id')->references('id')->on('farmacias')->onUpdate('restrict')->onDelete('cascade');
            $table->string('status')->default(1);
            $table->date('entrada');
            $table->date('saida')->nullable(true);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmtoresp');
    }
}
