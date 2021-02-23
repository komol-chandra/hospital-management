<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontendUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('frontend_users', function (Blueprint $table) {
            $table->id();
            $table->string('type')->default('patient');
            $table->integer('parentId')->nullable();
            $table->string('full_name')->nullable();
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address')->nullable();
            $table->string('mobile')->unique();
            $table->string('birthday')->nullable();
            $table->tinyInteger('gender')->nullable();
            $table->string('picture')->default('backend/files/profile.jpg');
            $table->unsignedBigInteger('blood_id')->nullable();
            $table->foreign('blood_id')->references('id')->on('bloods')->onDelete('set null');
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
        Schema::dropIfExists('frontend_users');
    }
}
