<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStaffPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('salary')->nullable();
            $table->double('paid')->nullable();
            $table->double('due')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->text('details')->nullable();
            $table->integer('staff_id')->unsigned();
            $table->foreign('staff_id')->references('id')->on('staffs')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('staff_payments');
    }
}
