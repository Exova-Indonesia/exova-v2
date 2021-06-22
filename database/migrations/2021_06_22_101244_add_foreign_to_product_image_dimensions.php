<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToProductImageDimensions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_image_dimensions', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('small')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('medium')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('large')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('original')->references('id')->on('files')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_image_dimensions', function (Blueprint $table) {
            //
        });
    }
}
