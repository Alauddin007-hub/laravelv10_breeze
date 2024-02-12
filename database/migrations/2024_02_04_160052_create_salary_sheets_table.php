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
        Schema::create('salary_sheets', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('employee_id');
            $table->integer('basic')->nullable();
            $table->integer('dine_allowance')->nullable();
            $table->integer('conveneynce_allowance')->nullable();
            $table->integer('madical_allowance')->nullable();
            $table->integer('rent_allowance')->nullable();
            $table->integer('net_salary')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
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
