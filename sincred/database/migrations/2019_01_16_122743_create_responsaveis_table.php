<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResponsaveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsaveis', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('farmacias_id');
            $table->foreign('farmacias_id')->references('id')->on('farmacias')->onDelete('cascade');
            $table->string('nome');
            $table->string('cpf');
            $table->string('email');
            $table->string('celular');
            $table->string('cep');
            $table->string('logradouro');
            $table->string('bairro');
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->unsignedInteger('states_id');
            $table->foreign('states_id')->references('id')->on('states')->onDelete('cascade');
            $table->unsignedInteger('cities_id');
            $table->foreign('cities_id')->references('id')->on('cities')->onDelete('cascade');
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
        Schema::dropIfExists('responsaveis');
    }
}
