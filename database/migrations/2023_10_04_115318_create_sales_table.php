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
        Schema::create('sales', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('drink_id');
            $table->unsignedBigInteger('employee_id');

            $table->foreign('drink_id')->references('id')->on('drinks');
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->integer('quantity_sold');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_type', ['cash', 'mpesa', 'card', 'debit'])->default('cash');
            $table->date('sale_date');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sales');
    }
};
