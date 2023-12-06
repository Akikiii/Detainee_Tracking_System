<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('case_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('case_id');
            $table->string('event_type');
            $table->date('event_date');
            $table->text('description');
            $table->string('related_entity');
            $table->string('event_outcome');
            $table->string('verdict')->nullable();
            $table->string('bail_confirmation')->nullable();

            // Use foreign() instead of foreignId() for unsignedBigInteger columns
            $table->unsignedBigInteger('updated_by')->default(auth()->id());
            $table->foreign('updated_by')->references('id')->on('users');

            $table->timestamps();

            $table->foreign('case_id')->references('case_id')->on('cases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('case_events');
    }
}
