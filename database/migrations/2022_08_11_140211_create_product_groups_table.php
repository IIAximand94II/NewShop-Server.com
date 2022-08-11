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
        Schema::create('product_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('quantity')->default(0);
            $table->float('price')->default(0);
            $table->timestamps();

            $table->index('product_id', 'product_product_groups_idx');
            $table->foreign('product_id', 'product_product_groups_fk')->on('products')->references('id');

            $table->index('color_id', 'color_product_groups_idx');
            $table->foreign('color_id', 'color_product_groups_fk')->on('colors')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_groups');
    }
};
