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
        Schema::create('product_group_sizes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('size_id');

            $table->index('group_id', 'product_group_sizes_group_idx');
            $table->foreign('group_id', 'product_group_sizes_group_fk')->on('product_groups')->references('id');

            $table->index('size_id', 'product_group_sizes_size_idx');
            $table->foreign('size_id', 'product_group_sizes_size_fk')->on('sizes')->references('id');

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
        Schema::dropIfExists('product_group_sizes');
    }
};
