<?php

use Domain\Cart\Enums\CartPayTypeEnum;
use Domain\Cart\Enums\CartStatusEnum;
use Domain\Cart\Enums\DeliveryTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('address_id');
            $table->longText('note')->nullable();
            $table->enum('pay_type', [CartPayTypeEnum::values()])->nullable();
            $table->enum('delivery_type', [DeliveryTypeEnum::values()])->nullable();
            $table->enum('status', [CartStatusEnum::values()])->nullable();
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
        Schema::dropIfExists('cart');
    }
};
