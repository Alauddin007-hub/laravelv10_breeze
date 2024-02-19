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
        Schema::create('payrolles', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('employee_id');
            $table->tinyInteger('salary_sheets_id');
            $table->tinyInteger('deduction_id')->nullable();
            $table->integer('pf')->nullable();
            $table->integer('leave')->nullable();
            $table->integer('prof_tax')->nullable();
            $table->integer('leabour_welfare')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolles');
    }
};
