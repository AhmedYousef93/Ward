<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pay_id')->unsigned()->index();
            $table->foreign('pay_id')->references('id')->on('pays')->onDelete('cascade');
            $table->integer('flower_id')->unsigned()->index();
            $table->foreign('flower_id')->references('id')->on('flowers')->onDelete('cascade');
            $table->integer('flowersize_id')->unsigned()->index();
            $table->integer('addition_id')->unsigned()->index();
            $table->integer('qty');
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
        Schema::dropIfExists('orders');
    }
}
