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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id');
            $table->string('product_name');
            $table->longText('product_short_description');
            $table->longText('product_long_description');
            $table->integer('product_price');
            $table->float('product_quantity');
            $table->integer('product_alert_quantity');
            $table->string('product_thumbnail_photo')->default('default_product_thumbnail_photo.jpg');
            $table->longText('slug');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
