<?php

use Domain\Cart\Enums\CartPayTypeEnum;
use Domain\Cart\Enums\CartStatusEnum;
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
            $table->longText('address')->nullable();
            $table->longText('note')->nullable();
            $table->enum('pay_type', [CartPayTypeEnum::values()])->default(CartPayTypeEnum::CASH->value);
            $table->enum('status', [CartStatusEnum::values()])->default(CartStatusEnum::WAITING->value);
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
