<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->enum('type_is', ['personal', 'business'])->nullable();
            $table->string('mode')->nullable();//rent , sale, required
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->text('detailes')->nullable();
            $table->text('tags')->nullable();
            $table->decimal('cost',8,2)->nullable();
            $table->boolean('cost_hide')->default(0);
            $table->boolean('via_message')->default(0);
            $table->boolean('disturb_hours')->default(0);
            $table->boolean('phone_show')->default(0);
            $table->unsignedInteger('phone')->nullable();
            $table->boolean('whatsapp_show')->default(0);
            $table->unsignedInteger('whatsapp')->nullable();
            $table->boolean('premium')->default(0);
            $table->unsignedInteger('totle_viwes')->default(0);
            $table->unsignedInteger('totle_lokes')->default(0);
            $table->boolean('published')->default(0);
            $table->dateTime('published_at');
            $table->boolean('sold')->default(0);
            $table->unsignedBigInteger('user_id');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('city_id')->references('id')->on('cites')->onUpdate('CASCADE')->onDelete('NO ACTION');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
        Schema::dropIfExists('ads');
    }
}
