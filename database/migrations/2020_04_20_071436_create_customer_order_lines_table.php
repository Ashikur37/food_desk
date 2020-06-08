<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCustomerOrderLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_order_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->double('subtotal')->nullable();
            $table->integer('customer_order_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->integer('medicine_unit_type_id')->unsigned();
            $table->foreign('customer_order_id')->references('id')->on('customer_orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('medicine_unit_type_id')->references('id')->on('medicine_unit_types')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('customer_order_lines');
    }
}
