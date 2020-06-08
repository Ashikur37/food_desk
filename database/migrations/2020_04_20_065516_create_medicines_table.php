<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('buying_price')->nullable();
            $table->double('selling_price')->nullable();
            $table->integer('quantity')->nullable();
            $table->text('details')->nullable();
            $table->string('image')->nullable();
            $table->integer('group_name_id')->unsigned();
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('shelf_id')->unsigned();
            $table->integer('medicine_type_id')->unsigned();
            $table->foreign('group_name_id')->references('id')->on('group_names')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('shelf_id')->references('id')->on('shelves')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medicine_type_id')->references('id')->on('medicine_types')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medicines');
    }
}
