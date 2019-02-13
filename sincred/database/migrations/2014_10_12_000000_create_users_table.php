<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('user')->unique();
            $table->unsignedInteger('farmacias_id')->nullable('true');
            $table->foreign('farmacias_id')->references('id')->on('farmacias')->onDelete('cascade');
            $table->unsignedInteger('responsaveis_id')->nullable('true');
            $table->foreign('responsaveis_id')->references('id')->on('responsaveis')->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
