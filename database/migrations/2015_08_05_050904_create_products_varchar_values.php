<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsVarcharValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('products_varchar_values', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('entity_id')->unsigned();
                $table->integer('attribute_id')->unsigned();
                $table->string('value');
                $table->timestamps();
            });
            
            Schema::table('products_varchar_values',function(Blueprint $table){
                 $table->foreign('entity_id')
                    ->references('id')->on('entities')->onDelete('cascade');

                  $table->foreign('attribute_id')
                    ->references('id')->on('attributes')->onDelete('cascade');
            }); 
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products_varchar_values');
    }
}
