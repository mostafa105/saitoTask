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
        Schema::create('bill_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId("product_id")->constrained();
            $table->unsignedInteger('quantity');
            ////////////////////////////////////////
            // i was created this column to here
            // cz get unit price if the product price
            // is changed in the database
            $table->unsignedInteger('subtotal');
            $table->foreignId("bill_id")->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers_products');
    }
};
