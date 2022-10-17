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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->float('total');
            $table->unsignedInteger('qty');
            $table->unsignedSmallInteger('status')->default(0);
            $table->text('name');
            $table->text('note')->nullable();
            $table->jsonb('address');
            $table->timestamps();

            $table->index('user_id', 'order_user_idx');
            $table->foreign('user_id', 'order_user_fk')->references('id')->on('users');

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
        Schema::dropIfExists('orders');
    }
};
