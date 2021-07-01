<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_requests', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('product_id')->nullable();
            $table->bigInteger('seller_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('location_id')->unsigned()->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->tinyInteger('max_return')->nullable();
            $table->boolean('is_meet_seller');
            $table->integer('price');
            $table->dateTime('due_at')->nullable();
            $table->dateTime('meet_at')->nullable();
            $table->tinyInteger('status');
            $table->softDeletes();
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
        Schema::dropIfExists('order_requests');
    }
}
