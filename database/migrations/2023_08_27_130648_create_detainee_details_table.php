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
        Schema::create('detainee_details', function (Blueprint $table) {
            $table->unsignedBigInteger('detainee_id');
            $table->string('gender');
            $table->string('mother_name')->nullable;
            $table->string('father_name')->nullable;
            $table->string('spouse_name')->nullable;
            $table->string('related_photos')->nullable;
            $table->text('crime_history')->nullable;
            $table->date('detention_begin');
            $table->date('birthday');
            $table->string('emergency_contact_number')->nullable;
            $table->string('emergency_contact_name')->nullablle;
            
            $table->timestamps();

            // Foreign Key 
            $table->foreign('detainee_id')->references('detainee_id')->on('detainees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detainee_details');
    }
};
