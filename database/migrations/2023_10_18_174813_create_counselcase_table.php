<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     *  this is not counsel case
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('counsel_case_assignment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->unsignedBigInteger('detainee_id');
            $table->unsignedBigInteger('case_id');
            $table->string('assigned_lawyer');
            $table->date('date_assigned');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('detainee_id')->references('detainee_id')->on('detainees');
            $table->foreign('case_id')->references('case_id')->on('cases');
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