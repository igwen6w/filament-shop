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
        Schema::create('shop_products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->longText('detail')->nullable();
            $table->text('specification')->nullable();
            $table->text('parameter')->nullable();
            $table->text('service')->nullable();
            $table->string('image');
            $table->text('images');
            $table->string('video')->nullable();
            $table->decimal('price_cost', 10, 2);
            $table->decimal('price_sale', 10, 2);
            $table->decimal('price_origin', 10, 2);
            $table->unsignedBigInteger('sold_count')->default(0);
            $table->unsignedBigInteger('sold_count_real')->default(0);
            $table->unsignedBigInteger('review_count_real')->default(0);
            $table->unsignedBigInteger('review_count')->default(0);
            $table->unsignedBigInteger('inventory_count')->default(0);
            $table->unsignedTinyInteger('status')->default(0)->index();
            $table->float('rating')->default(5)->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('online_products');
    }
};
