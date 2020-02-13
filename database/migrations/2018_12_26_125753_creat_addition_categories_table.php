<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatAdditioncategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addition_categories', function($table)
        {
            $table->increments('id');
          
             $table->string('name')->nullable();
            $table->string('subtitle')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->integer('best')->nullable();
            
            $table->string('image')->nullable();
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
        Schema::dropIfExists('addition_categories ');
    }
}
