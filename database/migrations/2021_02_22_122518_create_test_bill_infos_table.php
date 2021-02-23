<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestBillInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_bill_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_bill_id');
            $table->foreign('test_bill_id')->references('id')->on('test_bills')->onDelete('cascade');
            $table->unsignedBigInteger('test_id');
            $table->foreign('test_id')->references('id')->on('tests')->onDelete('cascade');
            $table->text('description');
            $table->string('quantity');
            $table->string('price');
            $table->string('sub_total');
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
        Schema::dropIfExists('test_bill_infos');
    }
}
