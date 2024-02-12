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
        Schema::create('employee_leaves', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('leave_type_id');
            $table->tinyInteger('employee_id');
            $table->date('from')->nullable();
            $table->date('to')->nullable();
            $table->string('total_leave')->nullable();
            $table->string('reason')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    // 
    //     'from','to','reason','status',

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee_leave');
    }
};
