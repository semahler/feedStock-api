<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStockMovementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock_movement', function (Blueprint $table) {
            $table->unsignedInteger('stock_movement_id')->autoIncrement();
            $table->integer('feed_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('feed_id')->references('feed_id')->on('tbl_feed');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stock_movement');
    }
}
