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
        Schema::create('employee_attendences', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('employee_id');
            $table->string('checkin')->nullable();
            $table->string('checkout')->nullable();
            $table->date('date')->nullable();
            $table->string('total_work_hours')->nullable();
            $table->string('status')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_attendences');
    }
};
