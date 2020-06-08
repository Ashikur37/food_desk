<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierOrderReturnLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_order_return_lines', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('quantity')->nullable();
            $table->double('price')->nullable();
            $table->double('discount')->nullable();
            $table->double('subtotal')->nullable();
            $table->integer('supplier_order_return_id')->unsigned();
            $table->integer('medicine_id')->unsigned();
            $table->integer('medicine_unit_type_id')->unsigned();
            $table->foreign('supplier_order_return_id')->references('id')->on('supplier_order_returns')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::drop('supplier_order_return_lines');
    }
}
