<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('new_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique()->nullable();
            $table->string('mobile');
            $table->string('date');
            $table->unsignedBigInteger('department')->nullable();
            $table->foreign('department')->references('id')->on('departments')->onDelete('set null');
            $table->unsignedBigInteger('doctor')->nullable();
            $table->foreign('doctor')->references('id')->on('doctors')->onDelete('set null');
            $table->string('message');
            // $table->tinyInteger('status');
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
        Schema::dropIfExists('new_appointments');
    }
}
