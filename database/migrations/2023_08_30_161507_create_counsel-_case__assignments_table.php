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
            $table->string('team_name'); // Team Name
            $table->string('team_leader_name')->nullable(); // Add the team_leader_name column
            $table->unsignedBigInteger('case_id')->nullable(); // Case ID(s)
            $table->foreign('case_id')->references('case_id')->on('cases'); // Link to Cases table
            $table->date('creation_date'); // Creation Date
            $table->text('description')->nullable(); // Description
            $table->enum('status', ['active', 'disbanded', 'on_hold']); // Status
            // Add other fields for meetings or notes if needed
            $table->timestamps(); // Created_at and Updated_at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};

