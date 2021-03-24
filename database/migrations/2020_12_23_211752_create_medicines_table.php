<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicines', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on('medicine_types')->onDelete('set null');
            $table->unsignedBigInteger('generic_id')->nullable();
            $table->foreign('generic_id')->references('id')->on('generics')->onDelete('set null');
            $table->unsignedBigInteger('manufacturer_id')->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('set null');

            $table->string('dosage')->nullable();
            $table->string('vat')->nullable();
            $table->unsignedBigInteger('unit_type_id')->nullable();
            $table->foreign('unit_type_id')->references('id')->on('unit_types')->onDelete('set null');
            $table->string('single_unit_weight')->nullable();
            $table->string('box_weight')->nullable();
            $table->string('minimum_unit')->nullable();
            $table->string('unit_location')->nullable();

            $table->string('sku')->nullable();
            $table->string('tax')->nullable();
            $table->string('details')->nullable();
            $table->text('picture')->nullable();
            $table->string('per_box')->nullable();
            $table->string('price');
            $table->tinyInteger('status')->default(1);
            $table->unsignedInteger('created_by');
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
        Schema::dropIfExists('medicines');
    }
}
