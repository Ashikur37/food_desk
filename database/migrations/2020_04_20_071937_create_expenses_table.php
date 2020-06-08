<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateExpensesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->double('cost')->nullable();
            $table->double('paid')->nullable();
            $table->double('due')->nullable();
            $table->text('details')->nullable();
            $table->string('image')->nullable();
            $table->integer('expense_type_id')->unsigned();
            $table->foreign('expense_type_id')->references('id')->on('expense_types')->onDelete('cascade')->onUpdate('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('expenses');
    }
}
