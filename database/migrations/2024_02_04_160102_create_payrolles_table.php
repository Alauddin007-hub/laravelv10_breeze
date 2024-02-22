<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    //  id 	employee_id 	salary_sheets_id 	month_of_salary 	conveneynce_allowance 	madical_allowance 	rent_allowance 	gross_salary 	pf 	leave 	prof_tax 	leabour_welfare 	net_salary 	status
    public function up(): void
    {
        Schema::create('payrolles', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('employee_id');
            $table->tinyInteger('salary_sheets_id');
            $table->string('month_of_salary')->nullable();
            $table->integer('dine_allowance')->nullable();
            $table->integer('conveneynce_allowance')->nullable();
            $table->integer('madical_allowance')->nullable();
            $table->integer('rent_allowance')->nullable();
            $table->integer('gross_salary')->nullable();
            $table->integer('pf')->nullable();
            $table->integer('leave')->nullable();
            $table->integer('prof_tax')->nullable();
            $table->integer('leabour_welfare')->nullable();
            $table->integer('net_salary')->nullable();
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
