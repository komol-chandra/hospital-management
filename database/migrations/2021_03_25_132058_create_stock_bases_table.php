<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockBasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_bases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('set null');
            $table->date('today_date');
            $table->bigInteger('discounted_amount');
            $table->bigInteger('vat_amount');
            $table->bigInteger('other_amount');
            $table->bigInteger('grand_total');
            $table->bigInteger('pay');
            $table->bigInteger('due');
            $table->tinyInteger('status')->default(1);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
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
        Schema::dropIfExists('stock_bases');
    }
}
