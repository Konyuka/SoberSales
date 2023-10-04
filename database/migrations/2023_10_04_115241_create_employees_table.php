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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id')->unique();
            $table->string('name');
            $table->string('employee_photo')->nullable(); 
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('emergency_contact')->nullable(); 
            $table->date('birthdate')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('position');
            $table->decimal('salary', 10, 2);
            $table->decimal('commissions', 10, 2);
            $table->date('hire_date');
            $table->string('department')->nullable(); 
            $table->enum('employment_status', ['active', 'on_leave', 'terminated'])->default('active'); 

            $table->unsignedBigInteger('manager_id')->nullable(); 
            $table->foreign('manager_id')->references('id')->on('employees');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
