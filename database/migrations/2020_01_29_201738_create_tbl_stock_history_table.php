<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStockHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock_history', function (Blueprint $table) {
            $table->unsignedInteger('stock_history_id')->autoIncrement();
            $table->integer('food_id')->unsigned();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('food_id')->references('food_id')->on('tbl_food');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_stock_history');
    }
}
