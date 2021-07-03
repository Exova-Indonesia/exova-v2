<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('request_id')->unsigned();
            $table->bigInteger('customer_id')->unsigned();
            $table->bigInteger('seller_id')->unsigned();
            $table->bigInteger('payment_id')->unsigned()->nullable();
            $table->bigInteger('feedback_id')->unsigned()->nullable();
            $table->integer('deal_price');
            $table->integer('fees');
            $table->integer('earn')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
