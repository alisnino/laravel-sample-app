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
        Schema::create('purchase_order_product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('purchase_order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity')->default(1); // Store the quantity of each product in the order
            $table->timestamps();
        });

        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->dropForeign('purchase_orders_product_id_foreign'); // Drop the foreign key constraint
            $table->dropColumn('product_id');  // Drop the product_id column if it exists
            $table->dropColumn('quantity');  // Drop the quantity column if it exists
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_order_product');

        Schema::table('purchase_orders', function (Blueprint $table) {
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Add it back if needed
            $table->integer('quantity');  // Add it back if needed
        });
    }
};
