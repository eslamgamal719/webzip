<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaidBalanceTrasnsactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_paid_balance_trasnsactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('description')->nullable();
            $table->unsignedMediumInteger('paid_balance_cost')->default(1);
            $table->unsignedBigInteger('user_paid_balance_payment_id')->nullable();
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_paid_balance_payment_id', 'user_pbalance_payment_f')->references('id')->on('user_paid_balance_payments')->onUpdate('CASCADE')->onDelete('RESTRICT');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('ad_id')->references('id')->on('ads')->onUpdate('CASCADE')->onDelete('NO ACTION');
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
        Schema::dropIfExists('user_paid_balance_trasnsactions');
    }
}
