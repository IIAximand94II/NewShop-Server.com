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
        Schema::create('product_tags', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->integer('tag_id');

            $table->index('product_id', 'product_tags_product_idx');
            $table->foreign('product_id', 'product_tags_product_fk')->on('products')->references('id');

            $table->index('tag_id', 'product_tags_tag_idx');
            $table->foreign('color_id', 'product_tags_tag_fk')->on('tags')->references('id');

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
        Schema::dropIfExists('product_tags');
    }
};
