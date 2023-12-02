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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_name');
            $table->string('team_leader_name')->nullable();
            $table->unsignedBigInteger('case_id')->nullable();
            $table->foreign('case_id')->references('case_id')->on('cases')->onDelete('cascade'); // Add onDelete cascade
            $table->date('creation_date');
            $table->text('description')->nullable();
            $table->enum('status', ['active', 'disbanded', 'on_hold']);
            $table->timestamps();
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
