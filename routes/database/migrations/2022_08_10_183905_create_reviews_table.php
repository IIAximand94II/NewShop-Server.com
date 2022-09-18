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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->text('content');
            $table->smallInteger('grade')->unsigned()->nullable();
            $table->timestamps();

            $table->index('product_id', 'review_product_idx');
            $table->foreign('product_id', 'review_product_fk')->on('products')->references('id');

            $table->index('user_id', 'review_user_idx');
            $table->foreign('user_id', 'review_user_fk')->on('users')->references('id');

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
        Schema::dropIfExists('reviews');
    }
};
