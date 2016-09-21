<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('place_id');
            $table->string('name');
            $table->string('street_address');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('country');
            $table->string('phone');
            $table->string('lat');
            $table->string('lng');
            $table->string('admin');
            $table->string('created_by');
            $table->string('updated_by');
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
        Schema::drop('businesses');
    }
}
