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
        Schema::create('salary_details', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('employee_id');
            $table->integer('basic')->nullable();
            $table->integer('daily_rate')->nullable();
            $table->integer('hourly_rate')->nullable();
            // $table->integer('conveneynce_allowance')->nullable();
            // $table->integer('madical_allowance')->nullable();
            // $table->integer('rent_allowance')->nullable();
            // $table->integer('gross_salary')->nullable();
            $table->integer('created_by')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_sheets');
    }
};
