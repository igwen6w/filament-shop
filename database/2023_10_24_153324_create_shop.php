<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shop_categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('rating')->default(5);
            $table->unsignedBigInteger('parent_id')->default(0)
                ->index();
            $table->text('description')->nullable();
            $table->string('icon')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->string('sku', 32)->index();
            $table->string('slug');
            $table->string('cover');
            $table->unsignedBigInteger('sold_count')->default(0);
            $table->unsignedBigInteger('sold_count_real')->default(0);
            $table->unsignedBigInteger('review_count_real')->default(0);
            $table->unsignedBigInteger('review_count')->default(0);
            $table->unsignedBigInteger('inventory_count')->default(0);
            $table->unsignedBigInteger('like_count')->default(0);
            $table->unsignedBigInteger('share_count')->default(0);
            $table->unsignedTinyInteger('status')->default(0)->index();
            $table->float('rating')->default(5)->index();
            $table->timestamps();
        });

        Schema::create('shop_product_intros', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_product_id')->unique();
            $table->foreign('shop_product_id')
                ->references('id')->on('shop_products')->onDelete('cascade');
        });

        Schema::create('shop_product_intro_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_product_intro_id');
            $table->string('locale', 10);

            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('detail')->nullable();
            $table->text('specification')->nullable();
            $table->text('parameter')->nullable();
            $table->text('service')->nullable();
            $table->text('price_specification')->nullable();
            $table->decimal('price_cost', 10, 2);
            $table->decimal('price_sale', 10, 2);
            $table->decimal('price_origin', 10, 2);
            $table->string('price_unit', 10)->default('CNY');

            $table->unique(['shop_product_intro_id', 'locale']);
            $table->foreign('shop_product_intro_id')
                ->references('id')->on('shop_product_intros')->onDelete('cascade');
        });



        Schema::create('shop_product_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_product_id');

            $table->foreign('shop_product_id')->references('id')
                ->on('products')->onDelete('cascade');
            $table->string('locale', 10);
            $table->string('title');
            $table->string('cover');
            $table->string('path');
            $table->float('rating')->default(5);

            $table->index(['shop_product_id', 'locale']);
        });

        Schema::create('shop_product_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_product_id')->index();

            $table->foreign('shop_product_id')
                ->references('id')->on('products')->onDelete('cascade');
            $table->string('locale', 10)->index();
            $table->string('path');
            $table->float('rating')->default(5);

            $table->index(['shop_product_id', 'locale']);
        });

        Schema::create('shop_category_product', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_product_id')->index();
            $table->unsignedBigInteger('shop_category_id')->index();

            $table->foreign('shop_product_id')
                ->references('id')->on('shop_products')->onDelete('cascade');
            $table->foreign('shop_category_id')
                ->references('id')->on('shop_categories')->onDelete('cascade');

        });

        Schema::create('shop_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->string('key', 32);
            $table->text('value')->nullable();
            $table->string('type', 16);
//            $table->string('value_unit', 16)->nullable();
            $table->timestamps();
        });

        Schema::create('shop_product_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shop_product_id')->index();
            $table->unsignedBigInteger('shop_custom_field_id')->index();
            // value
            // value_unit
        });

        Schema::create('shop_product_custom_field_translations', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('shop_product_custom_field_id');
            $table->string('locale', 16);

            $table->text('value');
            $table->string('value_unit', 16)->nullable();

            $table->primary(['shop_product_custom_field_id', 'locale']);
            $table->foreign('shop_product_custom_field_id')
                ->references('id')
                ->on('shop_product_custom_fields')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shop_products');
        Schema::dropIfExists('shop_product_intros');
        Schema::dropIfExists('shop_product_intro_translations');
        Schema::dropIfExists('shop_product_images');
        Schema::dropIfExists('shop_product_videos');
        Schema::dropIfExists('shop_categories');
        Schema::dropIfExists('shop_category_product');
        Schema::dropIfExists('shop_product_custom_fields');
        Schema::dropIfExists('shop_custom_fields');
    }
};
