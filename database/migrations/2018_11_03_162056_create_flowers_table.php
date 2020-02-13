<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFlowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flowers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('salary')->nullable();
            $table->string('sku')->nullable();
            $table->integer('best')->nullable();
            $table->integer('leng')->nullable();
            $table->integer('widt')->nullable();
            $table->string('tags')->nullable();
            $table->string('type')->nullable();






            $table->text('body')->nullable();
            $table->tinyInteger('status')->nullable();
            $table->tinyInteger('shipping')->default(0);
            $table->string('image')->nullable();
           

           
        //    $table->integer('shop_id')->unsigned()->index();
         //   $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            
             $table->integer('designer_id')->unsigned()->index();
            $table->foreign('designer_id')->references('id')->on('designers')->onDelete('cascade');
            $table->integer('category_id')->unsigned()->index();
           $table->BigInteger('additioncategory_id')->unsigned()->index();
           
            
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
        Schema::dropIfExists('flowers');
    }
}
