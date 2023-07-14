<?php

use Domain\Coupon\Enums\CouponTypeEnum;
use Domain\Coupon\Enums\DiscountTypeEnum;
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
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('title')->nullable();
            $table->integer('discount')->default(0);
            $table->enum('discount_type', [DiscountTypeEnum::values()])->default(DiscountTypeEnum::FIX_PRICE->value);
            $table->boolean('confirmed')->default(0);
            $table->enum('type', [CouponTypeEnum::values()])->default(CouponTypeEnum::CART->value);
            $table->timestamp('expires_at')->nullable();
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
        Schema::dropIfExists('coupons');
    }
};
