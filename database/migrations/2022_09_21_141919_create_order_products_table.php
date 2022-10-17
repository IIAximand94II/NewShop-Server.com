<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('size_id');
            $table->unsignedInteger('qty')->default(1);
            $table->float('price');
            $table->float('total');
            $table->timestamps();

            $table->index('order_id', 'order_product_order_idx');
            $table->foreign('order_id', 'order_product_order_fk')->references('id')->on('orders');

            $table->index('size_id', 'order_product_size_idx');
            $table->foreign('size_id', 'order_product_size_fk')->references('id')->on('sizes');

            $table->index('product_id', 'order_product_product_idx');
            $table->foreign('product_id', 'order_product_product_fk')->references('id')->on('products');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_products');
    }
};
