<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->integer('item_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('product_des');
            $table->integer('product_price');
            $table->string('product_size')->nullable();
            $table->string('product_size2')->nullable();
            $table->string('product_size3')->nullable();
            $table->string('product_size4')->nullable();
            $table->integer('activation_status');
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
        Schema::dropIfExists('tbl_product');
    }
}
