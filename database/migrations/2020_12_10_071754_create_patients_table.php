<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('name');
            $table->string('email')->unique();
            $table->text('address')->nullable();
            $table->string('mobile')->unique();
            $table->string('phone')->nullable();
            $table->string('birthday')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->unsignedBigInteger('blood_id')->nullable();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('set null');
            $table->text('picture')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->unsignedInteger('created_by');
            $table->date('today_date');
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
        Schema::dropIfExists('patients');
    }
}
