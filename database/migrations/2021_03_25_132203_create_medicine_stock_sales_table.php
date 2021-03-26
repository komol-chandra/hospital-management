<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineStockSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_stock_sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('medicine_id')->nullable();
            $table->foreign('medicine_id')->references('id')->on('medicines')->onDelete('set null');
            $table->date('today_date')->nullable();
            $table->bigInteger('batch')->nullable();
            $table->bigInteger('total_stock')->nullable();
            $table->bigInteger('total_sale')->nullable();
            $table->bigInteger('stock_count')->nullable();
            $table->bigInteger('sale_count')->nullable();
            $table->date('exp_date')->nullable();
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
        Schema::dropIfExists('medicine_stock_sales');
    }
}
