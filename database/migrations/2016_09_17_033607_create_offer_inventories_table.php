<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferInventoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_inventories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('creator_id');
            $table->integer('business_id');
            $table->integer('school_id');
            $table->integer('school_user_id');
            $table->string('assigned_by');
            $table->string('created_by');
            $table->string('updated_by');
            $table->dateTime('assigned_at');
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
        Schema::drop('offer_inventories');
    }
}
