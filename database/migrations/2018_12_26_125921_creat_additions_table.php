<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatAdditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additions', function($table)
        {
            $table->increments('id');
            $table->string('name');
            $table->integer('price');
            $table->text('body');
            $table->tinyInteger('status')->default(1);
            $table->string('image')->nullable();
            $table->integer('additioncategory_id')->unsigned()->index();
            $table->foreign('additioncategory_id')->references('id')->on('addition_categories')->onDelete('cascade');
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
        Schema::dropIfExists('additions');
    }
}
