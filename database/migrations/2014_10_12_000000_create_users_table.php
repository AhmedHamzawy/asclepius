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
            $table->string('user_name');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('gender');
            $table->date('birthdate');
            $table->integer('age');
            $table->string('telephone' , 100);
            $table->string('email')->unique();
            $table->text('address');
            $table->string('street');            
            $table->string('town');
            $table->Integer('country')->unsigned();
            $table->text('other')->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->integer('room_id')->unsigned()->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();            
            $table->date('appointment')->nullable();
            $table->string('sickness')->nullable();
            $table->string('prescription')->nullable();
            $table->string('price')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('country')->references('id')->on('countries');
            $table->foreign('department')->references('id')->on('departments');
            $table->foreign('room')->references('id')->on('rooms');
            $table->foreign('doctor')->references('id')->on('users');


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
