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
        Schema::create('user_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->text('education_qualifications')->nullable();
            $table->text('practice_areas')->nullable();
            $table->text('work_experience')->nullable();
            $table->text('professional_affiliations')->nullable();
            $table->text('cases_handled')->nullable();
            $table->text('languages_spoken')->nullable();
            $table->time('office_hours_open')->nullable();
            $table->time('office_hours_close')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_details');
    }
};
