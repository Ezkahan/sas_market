<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Domain\Banner\Enums\BannerEnum;
use Domain\Banner\Enums\BannerTypeEnum;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->increments('id');
            $table->string('link')->nullable();
            $table->string('image_path')->nullable();
            $table->integer('visited_count')->default(0);
            $table->string('category_id')->nullable();
            $table->enum('position', [BannerEnum::values()])->default(BannerEnum::MAIN->value);
            $table->enum('type', [BannerTypeEnum::values()])->default(BannerTypeEnum::WEB->value);
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
        Schema::dropIfExists('banners');
    }
};
