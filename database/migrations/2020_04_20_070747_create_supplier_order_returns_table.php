<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSupplierOrderReturnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supplier_order_returns', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('comment')->nullable();
            $table->double('total')->nullable();
            $table->double('discount')->nullable();
            $table->double('paid')->nullable();
            $table->double('due')->nullable();
            $table->integer('supplier_order_id')->unsigned();
            $table->foreign('supplier_order_id')->references('id')->on('supplier_orders')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('supplier_order_returns');
    }
}
