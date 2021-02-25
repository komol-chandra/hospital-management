<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->string('mobile')->unique();
            $table->string('birthday')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('picture')->nullable();
            $table->unsignedBigInteger('blood_id')->nullable();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('set null');

            $table->string('type')->nullable();
            $table->integer('parentId')->nullable();
            $table->integer('status')->default(1);
            $table->unsignedInteger('created_by')->nullable();
            $table->unsignedInteger('updated_by')->nullable();
            $table->foreignId('current_team_id')->nullable();
            $table->tinyInteger('email_verified')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
