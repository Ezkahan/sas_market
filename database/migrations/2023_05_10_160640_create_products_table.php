<?php

use Domain\Product\Enums\DiscountTypeEnum;
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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('title')->nullable();
            $table->json('description')->nullable();
            $table->string('code');
            $table->unsignedBigInteger('brand_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('price');
            $table->integer('discount_amount')->default(0);
            $table->enum('discount_type', [DiscountTypeEnum::values()])->default(DiscountTypeEnum::FIX_PRICE->value);
            $table->boolean('in_stock')->default(true);
            $table->boolean('status')->default(false);
            $table->integer('stock')->default(1);
            $table->boolean('specially')->default(false);
            $table->integer('preview')->default(0);
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
        Schema::dropIfExists('products');
    }
};
