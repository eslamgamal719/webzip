<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserPaidBalancePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_paid_balance_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedMediumInteger('paid_balance_charge')->default(0);//no changes
            $table->unsignedMediumInteger('paid_balance_current')->default(0);//that will change
            $table->decimal('price',8,2);
            $table->string('promo_code')->nullable();
            $table->decimal('discount_value',8,2)->default(0);
            $table->decimal('total_price',8,2);
            $table->dateTime('expires_at')->nullable();
            $table->unsignedBigInteger('balance_package_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('balance_package_id','balance_package_f')->references('id')->on('balance_packages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('CASCADE')->onDelete('CASCADE');
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
        Schema::dropIfExists('user_paid_balance_payments');
    }
}
