<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name' , 150);
            $table->text('address');
            $table->string('town' , 255);
            $table->string('county' , 255);
            $table->string('post_code' , 10);
            $table->string('country' , 255);
            $table->string('telephone' , 100);
            $table->string('email' , 200);
            $table->string('website' , 200);
            $table->string('facebook' , 200);
            $table->string('twitter' , 200);
            $table->string('instagram' , 200);
            $table->string('youtube' , 200);
            $table->decimal('vat_rate', 5, 2);
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
        Schema::dropIfExists('settings');
    }
}
