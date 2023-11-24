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
        Schema::create('counsel_case_assignment', function (Blueprint $table) {
            $table->bigIncrements('assignment_id');
            $table->unsignedBigInteger('team_id');
            $table->unsignedBigInteger('detainee_id');
            $table->string('assigned_group');
            $table->date('date_assigned');
            $table->timestamps();
        
            $table->foreign('team_id')->references('id')->on('teams');
            $table->foreign('detainee_id')->references('detainee_id')->on('detainees');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counsel_case_assignment');
    }
};
