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
        Schema::create('terminations', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->string('termination_type');
            $table->string('subject');
            $table->integer('role_type_id')->nullable();
            $table->date('notice_date');
            $table->date('terminated_date');
            $table->string('discription')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terminations');
    }
};
