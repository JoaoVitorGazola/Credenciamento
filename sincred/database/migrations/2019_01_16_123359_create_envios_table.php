<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('envios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('processos_id');
            $table->foreign('processos_id')->references('id')->on('processos')->onDelete('cascade');
            $table->unsignedInteger('farmacias_id');
            $table->foreign('farmacias_id')->references('id')->on('farmacias')->onDelete('cascade');
            $table->unsignedInteger('responsaveis_id');
            $table->foreign('responsaveis_id')->references('id')->on('responsaveis')->onDelete('cascade');
            $table->string('pasta');
            $table->string('obs');
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
        Schema::dropIfExists('envios');
    }
}
