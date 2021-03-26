<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id')->nullable();
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('set null');
            $table->unsignedBigInteger('stock_base_id')->nullable();
            $table->foreign('stock_base_id')->references('id')->on('stock_bases')->onDelete('set null');

            $table->date('today_date');
            $table->bigInteger('qty');
            $table->bigInteger('batch');
            $table->bigInteger('purchase_rate');
            $table->bigInteger('sale_rate');
            $table->date('exp_date');
            $table->bigInteger('sub_total');
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
        Schema::dropIfExists('stock_details');
    }
}
