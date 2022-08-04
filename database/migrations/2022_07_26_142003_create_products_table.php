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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->string('title_image')->default('no_image.jpg');
            $table->string('preview_image')->default('preview_no_image.jpg');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedSmallInteger('gender');
            $table->enum('status', ['in_stock', 'on_order', 'no']);
            $table->unsignedFloat('price')->default(0);
            $table->unsignedFloat('old_price')->default(0);
            $table->unsignedBigInteger('quantity')->default(0);
            $table->unsignedSmallInteger('hit')->default(0);
            $table->unsignedSmallInteger('sale')->default(0);
            $table->timestamps();

            $table->index('category_id', 'product_category_idx');
            $table->foreign('category_id', 'product_category_fk')->on('categories')->references('id');

            $table->index('user_id', 'product_user_idx');
            $table->foreign('user_id', 'product_user_fk')->on('users')->references('id');

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
        Schema::dropIfExists('products');
    }
};
