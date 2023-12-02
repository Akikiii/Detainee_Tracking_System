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
            $table->string('mother_name');
            $table->string('father_name');
            $table->string('spouse_name');
            $table->string('related_photos');
            $table->text('crime_history');
            $table->date('detention_begin');
            $table->date('birthday');
            $table->string('emergency_contact_number');
            $table->string('emergency_contact_name');
            
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
