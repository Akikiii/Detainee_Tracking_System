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
        Schema::create('detainees', function (Blueprint $table) {
            $table->unsignedBigInteger('detainee_id')->index();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('middle_name');
            $table->string('home_address');
            $table->string('contact_number'); // Change 'contact_address' to 'contact_number'
            $table->string('email_address')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detainees');
    }
};

