<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmaciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmacias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cnpj');
            $table->string('razaoSocial');
            $table->string('email');
            $table->string('fixo');
            $table->string('celular')->nullable();
            $table->string('cep');
            $table->string('logradouro');
            $table->string('bairro');
            $table->integer('numero')->nullable();
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
        Schema::dropIfExists('farmacias');
    }
}
