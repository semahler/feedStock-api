<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFeedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_feed', function (Blueprint $table) {
            $table->unsignedInteger('feed_id')->autoIncrement();
            $table->integer('manufacturer_id')->unsigned();
            $table->integer('feed_type_id')->unsigned();
            $table->integer('package_unit_id')->unsigned();
            $table->string('name');
            $table->boolean('status');
            $table->integer('rating')->unsigned();
            $table->string('url');
            $table->timestamps();

            $table->foreign('manufacturer_id')->references('manufacturer_id')->on('tbl_manufacturer');
            $table->foreign('feed_type_id')->references('feed_type_id')->on('tbl_feed_type');
            $table->foreign('package_unit_id')->references('package_unit_id')->on('tbl_package_unit');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_feed');
    }
}
