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
        Schema::create('deduction', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('employee_id');
            $table->tinyInteger('salary_sheets_id');
            $table->tinyInteger('advance_id');
            $table->tinyInteger('leave_id');
            $table->string('Provident_fund')->nullable();
            $table->string('prof_tax')->nullable();
            $table->string('leabour_welfare')->nullable();
            $table->boolean('status')->default(0);
            $table->string('created_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    // 'employee_id','salary_sheets_id','advance_id','pf', 'leave', 'prof_tax', 'leabour_welfare', 'created_by

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deduction');
    }
};
