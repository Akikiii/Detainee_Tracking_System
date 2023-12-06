<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCasesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cases', function (Blueprint $table) {
            $table->unsignedBigInteger('case_id')->index(); //Supposedly this is auto incrementing but for security purposes
            $table->string('case_name');
            $table->string('case_created');
            $table->unsignedBigInteger('detainee_id');
            $table->foreign('detainee_id')
            ->references('detainee_id')
            ->on('detainees')
            ->onDelete('cascade');
            $table->string("location");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cases');
    }
}
