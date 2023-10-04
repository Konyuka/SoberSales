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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('supplier_id');
            $table->unsignedBigInteger('inventory_id');

            $table->foreign('supplier_id')->references('id')->on('suppliers');
            $table->foreign('inventory_id')->references('id')->on('inventory');

            $table->integer('quantity');
            $table->decimal('total_amount', 10, 2);
            $table->date('purchase_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchases');
    }
};
