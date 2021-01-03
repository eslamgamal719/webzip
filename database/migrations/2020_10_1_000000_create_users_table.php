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
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedInteger('phone')->unique();
            $table->string('password');
            $table->string('bio');
            $table->string('lang_code',2)->default('ar');
            $table->unsignedSmallInteger('usual_balance')->default(0);
            $table->unsignedMediumInteger('paid_balance')->default(0);
            $table->unsignedMediumInteger('points')->default(0);
            $table->unsignedInteger('whatsapp')->nullable();
            $table->boolean('admin')->default(0);
            $table->string('api_token')->nullable();
            $table->dateTime('last_login')->nullable();
            $table->string('ip')->nullable();
            $table->dateTime('baned_at')->nullable();
            $table->rememberToken();
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
