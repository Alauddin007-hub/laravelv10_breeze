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
            $table->string('uuid')->nullable();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('education_experiance');
            $table->string('phone')->nullable();
            $table->bigInteger('department_id')->nullable();
            $table->bigInteger('designation_id')->nullable();
            $table->boolean('satus')->nullable();
            $table->string('company')->nullable();
            $table->string('image')->nullable();
            $table->softDeletes();
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
