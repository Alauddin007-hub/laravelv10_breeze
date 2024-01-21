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
        // \Schema::table('attendence_managers', function(Blueprint $table)
        // {
        //     if(!\Schema::hasColumn('leave_status','attendence_managers'))
        //     {
        //         $table->string('leave_status')->after('status');
        //     }
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
