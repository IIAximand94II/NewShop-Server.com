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
        Schema::create('product_sizes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('size_id');

            $table->index('product_id', 'product_sizes_product_idx');
            $table->foreign('product_id', 'product_sizes_product_fk')->on('products')->references('id');

            $table->index('size_id', 'product_sizes_size_idx');
            $table->foreign('size_id', 'product_sizes_size_fk')->on('sizes')->references('id');

            $table->timestamps();

            //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_sizes');
    }
};
