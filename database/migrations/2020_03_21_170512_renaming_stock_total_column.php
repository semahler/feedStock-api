<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamingStockTotalColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_stock_total', function (Blueprint $table) {
            $table->renameColumn('total_stock', 'quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tbl_stock_total', function (Blueprint $table) {
            $table->renameColumn('quantity', 'total_stock');
        });
    }
}
