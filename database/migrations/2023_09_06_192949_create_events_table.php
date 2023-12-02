<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    public function up()
    {
        Schema::create('case_events', function (Blueprint $table) {
            $table->id(); // Use 'id' as the primary key
            $table->unsignedBigInteger('case_id'); // Foreign key to reference cases table
            $table->string('event_type'); //Types of event
            $table->date('event_date'); //Start of event
            $table->text('description');
            $table->string('related_entity');
            $table->string('event_outcome');
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('case_id')->references('case_id')->on('cases')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('case_events');
    }
}
